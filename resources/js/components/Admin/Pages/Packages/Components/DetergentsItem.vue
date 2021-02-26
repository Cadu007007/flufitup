<template>
    <div class="DetergentsItem">
        <div class="flex-column-start">
            <select
                name="category_id"
                id=""
                class="select2"
                disabled
                style="width: 400px"
            >
                <option
                    :value="category.id"
                    v-for="category in categories"
                    :key="category.id"
                    :selected="itemid == category.id ? 'selected' : ''"
                    >{{ category.name }}</option
                >
            </select>

            <p class="types-title" v-if="types.length">The Types</p>

            <Detergents-Type-Item
                v-for="(type, index) in loadedtypes"
                :key="index"
                :label="type.label"
                :price="type.price"
                :img="type.img"
                :isdisabled="true"
                :deleteid="type.id"
                @delete-item="deleteItem(index)"
                :editformroute="editformroute"
                :deleteformroute="deleteformroute"
            />

            <!-- <p class="add-more-type" @click="addNewType">Add more types</p> -->

            <div class="seperator"></div>
        </div>
    </div>
</template>

<script>
import DetergentsTypeItem from "./DetergentsTypeItem";
export default {
    props: [
        "title",
        "date",
        "name",
        "categories",
        "types",
        "editformroute",
        "deleteformroute",
        "itemid"
    ],

    data() {
        return {
            loadedtypes: this.types,
            itemName: this.name
        };
    },
    components: {
        DetergentsTypeItem
    },
    methods: {
        addNewType() {
            this.loadedtypes.push({ label: "", price: "", img: "" });
        },
        deleteItem(index) {
            this.loadedtypes.splice(index, 1);
        }
    }
};
</script>

<style lang="scss">
.DetergentsItem {
    margin-top: 20px;
    .flex-column-start {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        .item-title {
            width: 812px;
            height: 45px;
            background: #f9f9f9;
            padding: 13px 15px;
            border: 2px solid #ededed;
            border-radius: 7px;
            margin-bottom: 20px;
        }
        .types-title {
            margin-bottom: 10px;
            margin-top: 20px;
        }
        .add-more-type {
            color: #22aee4;
            margin-bottom: 20px;
        }
        .seperator {
            width: 100%;
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }
    }
}
</style>
