<template>
    <form
        method="POST"
        class="edit-form"
        @submit="submitEditForm($event)"
    >
        <input type="hidden" :value="csrf" name="_token" />
        <input type="hidden" name="old" :value="hiddenvalue" />

        <!-- <input type="hidden" name="id" :value="itemid" /> -->
        <div class="HouseholdItem">
            <input
                :disabled="disablestate"
                class="household-input"
                type="text"
                name="label"
                id=""
                placeholder="Label"
                :value="label"
                required
            />
            <input
                :disabled="disablestate"
                class="household-input"
                type="number"
                name="price" min="0"
                id=""
                placeholder="Price"
                :value="price"
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
            <span v-if="disablestate" class="edit" @click="editPressed">
                <img src="/images/admin/icons/notification-edit.svg" alt="" />
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
            disablestate: this.isdisabled
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
    ],
    methods: {
        editPressed() {
            this.disablestate = false;
        },
        submitEditForm(event) {
            event.preventDefault();
            console.log("event.target ", $(event.target));
            var formValues = $(event.target).serialize();
            console.log("formValues: ", formValues);
            $.ajax({
                url: this.editformroute,
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

                console.log("formValues: ", formValues);

                $.ajax({
                    url: this.deleteformroute,
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
