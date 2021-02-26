<template>
    <div class="DryClean">
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
            class="DryCleanItem add-form"
            @submit="submitAddForm($event)"
        >
            <input
                class="dry-clean-input"
                type="text"
                name="label"
                id=""
                placeholder="Label"
                value=""
                required
            />
            <input
                class="dry-clean-input"
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
            <Dry-Clean-Item
                v-for="item in loadedItems"
                :key="item.id"
                :label="item.label"
                :price="item.price"
                :itemid="item.id"
                :isdisabled="true"
                :hiddenvalue="JSON.stringify(item)"
            />
        </div>

        <!-- <p class="add-new-item" @click="addNewItemContainer()">
            Add Another Dry Clean Item
        </p> -->
        <!--     
    <div class="button-container">
        <button class="save-button">Save</button>
    </div> -->
    </div>
</template>

<script>
import DryCleanItem from "./Components/DryCleanItem";
export default {
    data() {
        return {
            loadedItems: this.items,
            newItems: []
        };
    },
    props: ["title", "date", "items", "editformroute"],
    components: {
        DryCleanItem
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
$text-grey: #00000066;
$orange: #ffa800;
$blue: #22aee4;

.DryClean {
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
}
</style>
