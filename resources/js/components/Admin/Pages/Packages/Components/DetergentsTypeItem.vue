<template>
    <div class="DetergentsTypeItem">
        <div class="seperator" v-if="index > 0"></div>
        <form
            class="edit-form"
            method="POST"
            @submit="submitEditForm($event)"
            id="editForm"
        >
            <input type="hidden" :value="csrf" name="_token" />

            <div class="row">
                <div class="image-container">
                    <span
                        v-if="img"
                        class="remove-image"
                        :style="
                            disablestate
                                ? 'display: none'
                                : 'display: inline-block'
                        "
                        @click="removeImage($event)"
                        hidden
                        >X</span
                    >
                    <img
                        class="uploaded-image"
                        style="width: 102px;height: 102px;border: none"
                        :src="loadedImage"
                        alt=""
                    />

                    <div class="cam-button">
                        <input
                            @change="readURL($event)"
                            class="type-image-file"
                            type="file"
                            style="position: absolute; opacity: 0"
                            :disabled="disablestate"
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
                        :disabled="disablestate"
                        class="dry-clean-input"
                        type="text"
                        name="name"
                        id=""
                        placeholder="Label"
                        v-model="loadedLabel"
                    />
                    <input
                        :disabled="disablestate"
                        class="dry-clean-input"
                        type="number"
                        step="any"
                        min="0"
                        name="price"
                        id=""
                        placeholder="Price"
                        v-model="loadedPrice"
                    />

                    <span class="delete">
                        <form action="" class="delete-form" method="POST">
                            <input type="hidden" name="id" :value="deleteid" />
                            <input type="hidden" :value="csrf" name="_token" />

                            <img
                                src="/images/admin/icons/notification-cancel.svg"
                                alt=""
                                @click="deleteItem($event)"
                            />
                        </form>
                    </span>
                    <span v-if="disablestate" class="edit" @click="editPressed">
                        <img
                            src="/images/admin/icons/notification-edit.svg"
                            alt=""
                        />
                    </span>
                    <div class="" v-else>
                        <button class="save" type="submit">Save</button>
                        <button
                            class="cancel"
                            type="button"
                            @click="cancelPressed"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            disablestate: this.isdisabled,
            loadedLabel: this.label,
            loadedPrice: this.price,
            oldName: this.label,
            dataImage: ""
        };
    },
    computed: {
        loadedImage() {
            return this.imageasset.replace("image_path", this.img);
        }
    },
    props: [
        "label",
        "price",
        "img",
        "isdisabled",
        "hiddenvalue",
        "editformroute",
        "deleteformroute",
        "deleteid",
        "itemid",
        "categoryid",
        "categoryidvalue",
        "imageasset",
        "index"
    ],
    methods: {
        editPressed() {
            this.disablestate = false;
            this.$emit("edit-pressed");
        },
        cancelPressed() {
            this.disablestate = true;
            this.loadedLabel = this.oldName;
            this.$emit("cancel-pressed");
        },
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
                .find(".type-image-file")
                .val("");
            $(removeButton)
                .parent()
                .find(".uploaded-image")
                .attr("src", "");
            $(removeButton).attr("hidden", true);
        },
        submitEditForm(event) {
            event.preventDefault();
            console.log("event target: ", event.target);
            let editRoute = this.editformroute.replace("item_id", this.itemid);
            let uploadedImage = $(event.target).find(".type-image-file")[0]
                .files[0];
            console.log("uploadedImage: ", uploadedImage);
            let csrf = this.csrf;
            let itemid = this.itemid;
            let loadedLabel = this.loadedLabel;
            let loadedPrice = this.loadedPrice;
            let categoryidvalue = $(event.target)
                .parent()
                .parent()
                .find(".select2")
                .val();

            console.log(
                " $(event.target).parent().parent(): ",
                $(event.target)
                    .parent()
                    .parent()
                    .attr("class")
            );
            console.log("categoryidvalue: ", categoryidvalue);
            let disableState;
            axios({
                url: editRoute,
                method: "PUT",
                data: {
                    _token: csrf,
                    id: itemid,
                    name: loadedLabel,
                    price: loadedPrice,
                    category_detergents_id: categoryidvalue,
                    category_dryers_id: categoryidvalue,
                    category_fabrics_id: categoryidvalue,
                    category_scents_id: categoryidvalue,
                    image: $(event.target).find(".type-image-file")[0].files[0]
                },
                enctype: "multipart/form-data"
                // processData: false, // Important!
            }).then(response => {
                let returnedObject = response.data.data;
                console.log("returnedObject: ", returnedObject);
                if (response.data.success == true) {
                    disableState = true;
                    console.log("disableState: ", disableState);
                    this.showSuccessMessage(response.data.message);

                    this.disablestate = disableState;
                    this.$emit("save-pressed");
                }
            });
            // setTimeout(() => {
            //     if (disableState) {
            //         this.disablestate = disableState;
            //         this.$emit("save-pressed");
            //     }
            // }, 500);
        },
        deleteItem(event) {
            let deleteForm = $(event.target).parent();
            console.log("deleteForm: ", deleteForm);
            if (confirm("Are You Sure ?")) {
                var formValues = $(deleteForm).serialize();
                let deleteRout = this.deleteformroute.replace(
                    "item_id",
                    this.itemid
                );

                console.log("deleteRout: ", deleteRout);

                axios({
                    url: deleteRout,
                    method: "DELETE",
                    data: formValues
                }).then(response => {
                    if (response.data.success) {
                        this.showSuccessMessage(response.data.message);

                        $(event.target)
                            .parent()
                            .closest(".DetergentsTypeItem")
                            .remove();
                    }
                });
            }
        },
        showSuccessMessage(messageText) {
            $(".successMessage").removeClass("d-none");
            $(".successMessage").text(messageText);
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;
$red: rgb(214, 60, 60);

.DetergentsTypeItem {
    margin-bottom: 10px;
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
        width: 76px;
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
    .cancel {
        position: absolute;
        top: 40px;
        left: 670px;
        background: $red;
        color: #fff;
        padding: 5px 30px;
        border-radius: 15px;
    }
}
</style>
