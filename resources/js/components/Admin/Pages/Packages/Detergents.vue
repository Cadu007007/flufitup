<template>
    <div class="Detergents">
        <div class="alert alert-success mt-3 text-center d-none successMessage"></div>
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <p class="title" style="margin-top: 10px; font-weight: bold">
            Add New Type
        </p>
        <!-- @submit="submitAddForm($event)" -->
        <form
            method="POST"
            class="add-form"
            :action="addformroute"
            enctype="multipart/form-data"
            @submit="submitAddForm($event)"
            id="addForm"
        >
            <input type="hidden" :value="csrf" name="_token" />

            <div class="flex-column-start" style="margin-top: 10px;">
                <select
                    :name="categoryid"
                    id="categoryId"
                    class="select2"
                    style="width: 400px"
                >
                    <option
                        :value="category.id"
                        v-for="category in categories"
                        :key="category.id"
                        >{{ category.name }}</option
                    >
                </select>

                <p class="types-title" style="margin-top: 20px;">The Types</p>
                <div class="row">
                    <div class="image-container">
                        <span
                            class="remove-image"
                            @click="removeImage($event)"
                            hidden
                            >X</span
                        >
                        <img
                            class="uploaded-image"
                            style="width: 102px;height: 102px;border: none"
                            src=""
                            alt=""
                        />

                        <div class="cam-button">
                            <input
                                @change="readURL($event)"
                                class="image-file"
                                type="file"
                                style="position: absolute; opacity: 0"
                                name="image"
                            />
                            <img
                                class="cam-icon"
                                src="/images/admin/icons/camera-icon.svg"
                                alt=""
                            />
                        </div>
                    </div>
                    <div class="column">
                        <input
                            class="dry-clean-input"
                            type="text"
                            name="name"
                            id=""
                            placeholder="Label"
                            v-model="itemName"
                            required
                        />
                        <input
                            class="dry-clean-input"
                            type="number"
                            step="any"
                            min="0"
                            name="price"
                            id=""
                            placeholder="Price"
                            v-model="itemPrice"
                            required
                        />

                        <div class="">
                            <button class="save" type="submit">Save</button>
                        </div>
                    </div>
                </div>

                <!-- <p class="add-more-type" @click="addNewType">Add more types</p> -->
            </div>
        </form>
        <div class="seperator"></div>

        <p
            class="title"
            style="margin-top: 10px; font-weight: bold"
            v-if="loadedItems.length > 0"
        >
            Added Types
        </p>

        <div class="flex-column">
            <Detergents-Item
                v-for="item in loadedItems"
                :key="item.id"
                :categories="categories"
                :name="item.name"
                :types="item.detergents"
                :itemid="item.id"
                :editformroute="editformroute"
                :deleteformroute="deleteformroute"
                :categoryid="categoryid"
                :imageasset="imageasset"
            />
        </div>

        <!-- <p class="add-new-item" @click="addNewItemContainer()">Add Another Detergents Item</p> -->
        <!-- 
        <div class="button-container">
            <button class="save-button">Save</button>
        </div> -->
    </div>
</template>

<script>
import DetergentsItem from "./Components/DetergentsItem";
import DetergentsTypeItem from "./Components/DetergentsTypeItem";

export default {
    data() {
        return {
            loadedItems: this.items,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            itemName: "",
            itemPrice: ""
        };
    },
    props: [
        "title",
        "date",
        "items",
        "categories",
        "addformroute",
        "editformroute",
        "deleteformroute",
        "categoryid",
        "imageasset"
    ],
    components: {
        DetergentsItem,
        DetergentsTypeItem
    },
    methods: {

        readURL(event) {
            let input = event.target;
            console.log("input: ", input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    let imageContainer = $(input)
                        .parent()
                        .parent()
                        .find(".uploaded-image");
                    $(input)
                        .parent()
                        .parent()
                        .find(".remove-image")
                        .removeAttr("hidden");
                    imageContainer.attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        },
        removeImage(event) {
            let removeButton = event.target;
            $(removeButton)
                .parent()
                .find(".image-file")
                .val("");
            $(removeButton)
                .parent()
                .find(".uploaded-image")
                .attr("src", "");
            $(removeButton).attr("hidden", true);
        },
        submitAddForm(event) {
            event.preventDefault();
            var formValues = $(".add-form").serialize();
            console.log("formValues: ", formValues);
            let uploadedImage = $(".image-file")[0].files[0];
            var formDateObject = new FormData(event.target);
            formDateObject.append("_token", this.csrf);
            formDateObject.append("name", this.itemName);
            formDateObject.append("price", this.itemPrice);
            formDateObject.append(
                "category_detergents_id",
                $("#categoryId").val()
            );
            formDateObject.append("image", uploadedImage);

            // let loadedItems = this.loadedItems;
            axios({
                url: this.addformroute,
                method: "POST",
                data: formDateObject,
                enctype: "multipart/form-data"
                // processData: false, // Important!
            }).then(response => {
                let returnedObject = response.data.data;
                console.log("returnedObject: ", returnedObject);
                /* push data in the array */
                /* get the selected category id */
                let selectedCategory = $("#categoryId").val();
                console.log("selectedCategory: ", selectedCategory);
                this.loadedItems
                    .find(x => (x.id = returnedObject.category_detergents_id))
                    .detergents.push({
                        id: returnedObject.id,
                        name: returnedObject.name,
                        price: returnedObject.price,
                        img: returnedObject.image
                    });
                /* update the last added image */
                let newImagePath = this.imageasset.replace(
                    "image_path",
                    returnedObject.image
                );


                console.log("Loaed items: ", this.loadedItems
                    .find(x => (x.id = selectedCategory)));
                // console.log("newImagePath: ", newImagePath);
                setTimeout(() => {
                    $(".DetergentsTypeItem:last")
                        .find(".uploaded-image")
                        .attr("src", newImagePath);
                }, 600);


                // console.log("returnedObject.image: ", returnedObject.image);
            }).then(() => {
                window.location.href = window.location.href
            });
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$orange: #ffa800;
$blue: #22aee4;

.Detergents {
    width: 100%;
    height: 100%;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .flex-column-start {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }
    .add-new-item {
        width: fit-content;
        margin: 30px auto;
        text-align: center;
        color: $orange;
        font-family: "Open-Sans-Bold";
        font-size: 14px;
    }
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 30px auto;
        .save-button {
            margin: 30px auto;
            padding: 10px 40px;
            height: 45px;
            border-radius: 25px;
            background: $blue;
            color: #fff;
            font-size: 18px;
        }
    }

    .seperator {
        width: 100%;
        height: 1px;
        background: #ccc;
        margin: 20px 0;
    }

    .row {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .column {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        position: relative;
        margin-bottom: 10px;
    }
    .image-container {
        width: 102px;
        height: 102px;
        border: 1px solid #ccc;
        margin: 0 20px 10px 0;
        border-radius: 5px;
        position: relative;
        .cam-button {
            height: 30px;
            width: 100%;
            background: #00000066;
            position: absolute;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            .cam-icon {
                width: 24px;
                height: 24px;
            }
        }
        .remove-image {
            position: absolute;
            left: 83%;
            font-size: 10px;
            background: red;
            width: 15px;
            height: 15px;
            text-align: center;
            border-radius: 10px;
            top: 2px;
            color: #222;
        }
    }
    .household-input {
        width: 512px;
        height: 45px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
        margin: 6px 0;
    }
    .delete {
        position: absolute;
        top: 47px;
        left: 525px;
    }

    .dry-clean-input {
        width: 512px;
        height: 45px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
        margin: 6px 0;
    }
    .delete {
        position: absolute;
        top: 47px;
        left: 525px;
    }
    .edit {
        position: absolute;
        top: 47px;
        left: 565px;
    }
    .save {
        position: absolute;
        top: 40px;
        left: 565px;
        background: $blue;
        color: #fff;
        padding: 5px 30px;
        border-radius: 15px;
    }
}
</style>
