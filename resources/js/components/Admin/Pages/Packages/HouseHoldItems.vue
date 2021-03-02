<template>
    <div class="Household">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <p class="title" style="margin-top: 10px; font-weight: bold">
            Add New
        </p>
        <form
            action=""
            method="POST"
            class="HouseholdItem add-form"
            @submit="submitAddForm($event)"
        >
            <input type="hidden" :value="csrf" name="_token" />

            <input
                class="household-input"
                type="text"
                name="name"
                id=""
                placeholder="Label"
                value=""
                required
            />
            <input
                class="household-input"
                type="number"
                name="price"
                min="0"
                id=""
                placeholder="Price"
                value=""
                required
            />

            <div class="">
                <button class="save" type="submit">Save</button>
            </div>
        </form>

        <p class="title" style="margin-top: 10px; font-weight: bold">
            Added Items
        </p>
        <div class="flex-column">
            <House-Hold-Item
                v-for="item in loadedItems"
                :key="item.id"
                :label="item.label"
                :price="item.price"
                :itemid="item.id"
                :editformroute="editformroute"
                :deleteformroute="deleteformroute"
                :isdisabled="true"
                :hiddenvalue="JSON.stringify(item)"
            />
        </div>

        <!-- <p class="add-new-item" @click="addNewItemContainer()">Add Another Household Item</p> -->
        <!--     
    <div class="button-container">
        <button class="save-button">Save</button>
    </div> -->
    </div>
</template>

<script>
import HouseHoldItem from "./Components/HouseHoldItem";
export default {
    data() {
        return {
            loadedItems: this.items,
            newItems: [],
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    props: [
        "title",
        "date",
        "items",
        "addformroute",
        "editformroute",
        "deleteformroute"
    ],
    components: {
        HouseHoldItem
    },
    methods: {
        addNewItemContainer() {
            this.newItems.push({ label: "", price: "" });
        },
        deleteItem(index) {
            this.loadedItems.splice(index, 1);
        },
        deleteNewItem(index) {
            this.newItems.splice(index, 1);
        },
        submitAddForm(event) {
            event.preventDefault();
            var formValues = $(".add-form").serialize();
            console.log("formValues: ", formValues);

            $.ajax({
                url: this.addformroute,
                type: "POST",
                data: formValues,
                success: function(data) {
                    console.log("data: ", data);
                }
            });
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

$text-grey: #00000066;
$orange: #ffa800;
$blue: #22aee4;

.Household {
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
}
</style>
