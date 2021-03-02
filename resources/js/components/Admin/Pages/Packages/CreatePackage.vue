<template>
    <div class="AddPackage">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <br />
        <form action="/dummy" method="post">

            <input type="hidden" :value="csrf" name="_token" />

            <div
                class="package-title-div flex-column"
                style="margin-bottom: 20px"
            >
                <p class="title">Package Category</p>
                <select
                    class="select2"
                    name="category"
                    id=""
                    style="width: 300px"
                    required
                >
                    <option selected :value="null">Choose a category</option>
                    <option value="adhoc">Ad Hoc</option>
                    <option value="bi_weekly">Bi‐Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
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
                            required
                        />
                        <span class="delete" @click="clearPackageName">
                            <img
                                src="/images/admin/icons/notification-cancel.svg"
                                alt=""
                            />
                        </span>
                    </div>
<!-- 
                    <div class="package-features">
                        <AddPackageItem
                            v-for="(item, index) in items"
                            :key="index"
                            :label="item.label"
                            :data="item.data"
                            @delete-item="deleteItem(index)"
                        />
                    </div> -->

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            No. of Pickups Per Week
                        </p>
                        <select
                            name="no_pickups"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">1 Pickup</option>
                            <option value="2">2 Pickup</option>
                            <option value="3">3 Pickup</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Advance Notice
                        </p>
                        <select
                            name="advance_notice"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">1 Day</option>
                            <option value="2">2 Days</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Allowed Bags per Pickup
                        </p>
                        <select
                            name="bags_per_pickup"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">1 Bag</option>
                            <option value="2">2 Bags</option>
                            <option value="3">3 Bags</option>
                            <option value="4">4 Bags</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Return Service
                        </p>
                        <select
                            name="return_service"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="12">12 Hours</option>
                            <option value="24">24 Hours</option>
                            <option value="48">48 Hours</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Washing Options
                        </p>
                        <select
                            name="washing_option"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="machine_wash">Machine Wash</option>
                            <option value="hand_wash">Hand Wash</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Drying Options
                        </p>
                        <select
                            name="dry_clean_id"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="tumble_dry">Tumble Dry</option>
                            <option value="air_dry">Air Dry</option>
                            <option value="air_dry_flat">Air Dry - Flat</option>
                        </select>
                    </div>
                    <!-- <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Folding Options
                        </p>
                        <select
                            name="folding_option"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="1">Folding</option>
                            <option value="2">Hanger Per Bag</option>
                            <option value="3">Hanger Per Piece</option>
                        </select>
                    </div> -->
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Laundry Detergent
                        </p>
                        <select
                            name="detergent_id"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">Standard Line</option>
                            <option value="2">Special LineBag</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Laundry Softener
                        </p>
                        <select
                            name="laundry_softener"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">Standard Line</option>
                            <option value="2">Special LineBag</option>
                        </select>
                    </div>
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Scent Booster
                        </p>
                        <select
                            name="scent_id"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="1">None</option>
                            <option value="2">Standard Line</option>
                            <option value="3">Special LineBag</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Fabric Fresheners
                        </p>
                        <select
                            name="fabric_id"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="1">None</option>
                            <option value="2">Standard Line</option>
                            <option value="3">Special LineBag</option>
                        </select>
                    </div>
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Dryer Sheets
                        </p>
                        <select
                            name="dryer_id"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="1">None</option>
                            <option value="2">1 Sheet</option>
                            <option value="3">Multiple Per Bag</option>
                        </select>
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Dry Clean Credit
                        </p>
                        <input
                            name="dry_clean_credit"
                            class="add-package-value"
                            placeholder="Dry Clean Credit"
                            type="number"
                            min="0"
                            required
                        />
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            House Hold Credit
                        </p>
                        <input
                            name="house_hold_credit"
                            class="add-package-value"
                            placeholder="House Hold Credit"
                            type="number"
                            min="0"
                            required
                        />
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Added Value Services Credit
                        </p>
                        <input
                            name="added_value_service"
                            class="add-package-value"
                            placeholder="Added Value Services Credit"
                            type="number"
                            min="0"
                            required
                        />
                    </div>
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Rewards Points
                        </p>
                        <input
                            name="reward_points"
                            class="add-package-value"
                            placeholder="Rewards Points"
                            type="number"
                            min="0"
                            required
                        />
                    </div>
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Price of Extra Pound
                        </p>
                        <input
                            name="price_of_extra_pound"
                            class="add-package-value"
                            placeholder="Price of Extra Pound"
                            type="number"
                            min="0"
                            required
                        />
                    </div>
                </div>

                <div class="price-card-container">
                    <CreatePackagePriceCard
                        currency="$"
                        price="0"
                        pricename="price"
                        :isrequired="true"
                    />
                </div>
            </div>
        </form>

        <!-- <p class="add-new-item" @click="addNewItemContainer()">
            Add Another Feature
        </p> -->
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
    .flex-row {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .price-card-container {
        margin-left: 100px;
    }
    .package-title-div {
        position: relative;
        .category-select {
            padding: 10px;
            border-radius: 10px;
            margin: 0 20px;
            font-size: 14px;
            width: 300px;
        }
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

    .add-package-value {
        width: 312px;
        height: 45px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
        margin: 6px 0;
    }
}
</style>
<script>
import AddPackageItem from "./Components/AddPackageItem";
import CreatePackagePriceCard from "./Components/CreatePackagePriceCard";
import AddedValueContainer from "./Components/AddedValueContainer";

export default {
    props: ["title", "date", "addedvalues"],
    data() {
        return {
            name: "",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
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
