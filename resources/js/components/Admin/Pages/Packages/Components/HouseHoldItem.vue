<template>
    <form method="POST" class="edit-form" @submit="submitEditForm($event)">
        <input type="hidden" :value="csrf" name="_token" />
        <input type="hidden" name="old" :value="hiddenvalue" />

        <!-- <input type="hidden" name="id" :value="itemid" /> -->
        <div class="HouseholdItem">
            <input
                :disabled="disablestate || updatedDone"
                class="household-input"
                type="text"
                name="name"
                id=""
                placeholder="Label"
                :value="updatedlabel"
                required
            />
            <input
                :disabled="disablestate || updatedDone"
                class="household-input"
                type="number" step="any" 
                name="price"
                min="0"
                id=""
                placeholder="Price"
                :value="updatedprice"
                required
            />
            <span class="delete">
                <form action="" class="delete-form" method="POST">
                    <input type="hidden" name="id" :value="itemid" />
                    <input type="hidden" :value="csrf" name="_token" />
                    <img
                        src="/images/admin/icons/notification-cancel.svg"
                        alt=""
                        @click="deleteItem($event)"
                    />
                </form>
            </span>
            <span v-show="disablestate" class="edit" @click="editPressed">
                <img src="/images/admin/icons/notification-edit.svg" alt="" />
            </span>
            <div class="" v-show="!disablestate">
                <button class="save" type="submit">Save</button>
                <button
                    class="cancel"
                    type="button"
                    @click="cancelClicked()"
                >
                    Cancel
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            editmodal: false,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            disablestate: this.isdisabled,
            updatedDone: false,
            updatedlabel: this.label,
            updatedprice: this.price
        };
    },
    props: [
        "label",
        "price",
        "isdisabled",
        "hiddenvalue",
        "formroute",
        "itemid",
        "deleteformroute",
        "editformroute"
    ],
    methods: {
        editPressed() {
            this.disablestate = false;
            this.updatedDone = false;
        },
        submitEditForm(event) {
            event.preventDefault();
            console.log("event.target ", $(event.target));
            var formValues = $(event.target).serialize();
            console.log("formValues: ", formValues);
            let editRoute = this.editformroute.replace("item_id", this.itemid);

            let updatedLabel = this.label;
            let updatedPrice = this.price;

            let updateDoneState = this.updatedDone;

            $.ajax({
                url: editRoute,
                type: "PUT",
                data: formValues,
                success: function(data) {
                    if (data.success) {
                        let returnedObject = data.data;
                        console.log(
                            "Value of ~ file: HouseHoldItem.vue ~ line 98 ~ submitEditForm ~ returnedObject",
                            returnedObject
                        );
                        let selectedId = returnedObject.id;
                        console.log("selectedId: ", selectedId);
                        updatedLabel = returnedObject.name;
                        console.log("updatedLabel: ", updatedLabel);
                        updatedPrice = returnedObject.price;
                        updateDoneState = true;
                    }
                }
            });

            setTimeout(() => {
                this.updatedlabel = updatedLabel;
                this.updatedprice = updatedPrice;
                this.updatedDone = updateDoneState;

                console.log("this.updatedDone: ", this.updatedDone);
                this.cancelClicked()
            }, 500);
        },
        deleteItem(event) {
            let deleteForm = $(event.target).parent();
            console.log("deleteForm: ", deleteForm);
            if (confirm("Are You Sure ?")) {
                var formValues = $(deleteForm).serialize();

                console.log("formValues: ", formValues);
                let deleteRout = this.deleteformroute.replace(
                    "item_id",
                    this.itemid
                );

                $.ajax({
                    url: deleteRout,
                    type: "DELETE",
                    data: formValues,
                    success: function(data) {
                        console.log("data: ", data);
                        if (data.success) {
                            let itemContainer = $(deleteForm).parents(
                                ".edit-form"
                            );
                            $(itemContainer).remove();
                        }
                    }
                });
            }
        },
        cancelClicked() {
            this.disablestate = true;
        },
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;
$red: rgb(214, 60, 60);

.HouseholdItem {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    position: relative;
    margin-bottom: 10px;
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
