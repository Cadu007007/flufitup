<template>
    <div class="DetergentsItem">
        <div class="flex-column-center">
            <input
                type="text"
                class="item-title"
                placeholder="Detergent Name"
                v-model="itemName"
                disabled
            />

            <p class="types-title" v-if="types.length">The Types</p>

            <Detergents-Type-Item
                v-for="(type, index) in loadedtypes"
                :key="index"
                :label="type.label"
                :price="type.price"
                :img="type.img"
                @delete-item="deleteItem(index)"
            />

            <p class="add-more-type" @click="addNewType">Add more types</p>

        <div class="seperator"></div>
        </div>
    </div>
</template>

<script>
import DetergentsTypeItem from "./DetergentsTypeItem";
export default {
        props: ['title','date','name','types'],

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
            this.loadedtypes.push({ label: "", price: "", img:"" });
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
    .flex-column-center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
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
        }
        .add-more-type{
            color: #22AEE4;
            margin-bottom: 20px;
        }
        .seperator{
            width: 100%;
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }
    }
}
</style>
