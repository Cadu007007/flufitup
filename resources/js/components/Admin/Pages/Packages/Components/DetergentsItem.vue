<template>
    <div class="DetergentsItem" v-if="loadedtypes">
        <div class="flex-column-start">
            <select
                :name="categoryid"
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

            <p class="types-title">The Types</p>

            <Detergents-Type-Item
                v-for="type in loadedtypes"
                :key="type.id"
                :label="type.name"
                :price="type.price"
                :categoryid="categoryid"
                :categoryidvalue="getCategoryIdValue(type)"
                :img="type.image"
                :isdisabled="true"
                :deleteid="type.id"
                :itemid="type.id"
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
        "itemid",
        "categoryid"
    ],

    data() {
        return {
            itemName: this.name
        };
    },
    computed: {
        loadedtypes() {
            return this.types;
        }
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
        },
        getCategoryIdValue(type) {
            if (type.category_detergents_id > 0)
                return type.category_detergents_id;
            else if (type.category_fabric_id > 0)
                return type.category_fabric_id;
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
