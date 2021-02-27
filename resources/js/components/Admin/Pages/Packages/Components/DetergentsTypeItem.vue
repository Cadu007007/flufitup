<template>
    <div class="DetergentsTypeItem">
        <form
            action=""
            class="edit-form"
            method="POST"
            @submit="submitEditForm($event)"
        >
            <input type="hidden" :value="csrf" name="_token" />

            <div class="row">
                <div class="image-container">
                    <span
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
                        :src="img"
                        alt=""
                        
                    />

                    <div class="cam-button">
                        <input
                            @change="readURL($event)"
                            class="image-file"
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
                        :value="label"
                    />
                    <input
                        :disabled="disablestate"
                        class="dry-clean-input"
                        type="number"
                        min="0"
                        name="price"
                        id=""
                        placeholder="Price"
                        :value="price"
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
                            @click="disablestate = true"
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
            disablestate: this.isdisabled
        };
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
        "itemid"
    ],
    methods: {
        editPressed() {
            this.disablestate = false;
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
                .find(".image-file")
                .val("");
            $(removeButton)
                .parent()
                .find(".uploaded-image")
                .attr("src", "");
            $(removeButton).attr("hidden", true);
        },
        submitEditForm(event) {
            event.preventDefault();
            var formValues = $(event.target).serialize();
            console.log("formValues: ", formValues);

            let editRoute = this.editformroute.replace("item_id", this.itemid);
            $.ajax({
                url: editRoute,
                type: "PUT",
                data: formValues,
                success: function(data) {
                    console.log("data: ", data);
                }
            });
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

                $.ajax({
                    url: deleteRout,
                    type: "DELETE",
                    data: formValues,
                    success: function(data) {
                        console.log("data: ", data);
                    }
                });
            }
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
