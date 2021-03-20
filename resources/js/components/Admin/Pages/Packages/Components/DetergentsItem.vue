<template>
    <div class="DetergentsItem" v-if="loadedtypes.length">
        <div class="flex-column-start">
            <select
                :name="categoryid"
                id=""
                class="select2"
                :disabled="disableState"
                style="width: 400px"
            >
                <option
                    :value="category.id"
                    v-for="category in loadedCategories"
                    :key="category.id"
                    :selected="itemid == category.id ? 'selected' : ''"
                    >{{ category.name }}</option
                >
            </select>

            <p class="types-title">The Types</p>

            <Detergents-Type-Item
                v-for="(type,index) in loadedtypes"
                :key="type.id"
                :index="index"
                :label="type.name"
                :price="type.price"
                :categoryid="categoryid"
                :categoryidvalue="getCategoryIdValue(type)"
                :img="type.image"
                :isdisabled="true"
                :deleteid="type.id"
                :itemid="type.id"
                @delete-item="deleteItem(index)"
                @edit-pressed="changeIsDisabled"
                @save-pressed="changeIsDisabled"
                @cancel-pressed="disableState = true"
                :editformroute="editformroute"
                :deleteformroute="deleteformroute"
                :imageasset="imageasset"
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
        "categoryid",
        "imageasset"
    ],

    data() {
        return {
            loadedtypes: this.types,
            loadedCategories: this.categories,
            itemName: this.name,
            disableState: true
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
        },
        getCategoryIdValue(type) {
            if (type.category_detergents_id > 0){
                return type.category_detergents_id;
            }
            else if (type.category_fabric_id > 0){
                return type.category_fabric_id;
            }
            else if (type.category_dryer_id > 0){
                return type.category_dryer_id;
            }
            else if (type.category_scent_id > 0){
                return type.category_scent_id;
            }
        },
        changeIsDisabled() {
            this.disableState = !this.disableState;
        },
        
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
