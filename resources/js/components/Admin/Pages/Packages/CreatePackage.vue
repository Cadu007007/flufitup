<template>
    <div class="AddPackage">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <div class="flex-row">
            <div class="flex-column">
                <div class="package-title-div">
                    <p class="title">Package Name</p>
                    <input
                        class="package-name"
                        type="text"
                        name="name"
                        id=""
                        placeholder="Package Name"
                        v-model="name"
                    />
                    <span class="delete" @click="clearPackageName">
                        <img
                            src="/images/admin/icons/notification-cancel.svg"
                            alt=""
                        />
                    </span>
                </div>

                <div class="package-features">
                    <AddPackageItem
                        v-for="(item, index) in items"
                        :key="index"
                        :label="item.label"
                        :data="item.data"
                        @delete-item="deleteItem(index)"
                    />
                </div>
                <!-- Added Value Services -->
                <AddedValueContainer
                :values="addedvalues"
                :selectedvalues="[]" />
            </div>
            <div class="price-card-container">
                <CreatePackagePriceCard currency="$" price="0" />
            </div>
        </div>

        <p class="add-new-item" @click="addNewItemContainer()">
            Add Another Feature
        </p>

    </div>
</template>
<style lang="scss">
$text-grey: #00000066;
$orange: #ffa800;
$blue: #22aee4;

.AddPackage {
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
    .flex-row{
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .price-card-container{
        margin-left: 100px;
    }
    .package-title-div {
        position: relative;
        .title {
            font-size: 16px;
            font-family: "Open-Sans-Semibold";
        }
        .package-name {
            width: 512px;
            height: 45px;
            background: #f9f9f9;
            padding: 13px 24px;
            border: 1px solid #ededed;
            border-radius: 7px;
            margin: 10px 0;
        }
        .delete {
            position: relative;
            top: 5px;
            left: 10px;
        }
    }
    .package-features {
        margin: 10px 0;
    }
    .add-new-item {
        width: fit-content;
        margin: 30px auto;
        text-align: center;
        color: $orange;
        font-family: "Open-Sans-Bold";
        font-size: 14px;
    }

    
}
</style>
<script>
import AddPackageItem from "./Components/AddPackageItem";
import CreatePackagePriceCard from "./Components/CreatePackagePriceCard";
import AddedValueContainer from "./Components/AddedValueContainer";

export default {
    props: ["title", "date",'addedvalues'],
    data() {
        return {
            name: "",
            items: [{ label: "", data: "" }]
        };
    },
    components: {
        AddPackageItem,
        CreatePackagePriceCard,
        AddedValueContainer
    },
    methods: {
        clearPackageName() {
            this.name = "";
        },
        addNewItemContainer() {
            this.items.push({ label: "", data: "" });
        },
        deleteItem(index) {
            this.items.splice(index, 1);
        }
    }
};
</script>
