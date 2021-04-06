<template>
    <div class="AddPackage">
        <div
            class="alert alert-success mt-3 text-center d-none successMessage"
        ></div>
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <form method="post" class="add-form" @submit="storePackageInLocalStorage($event)">
            <input type="hidden" :value="csrf" name="_token" />

            <div class="flex-row">
                <div class="flex-column">
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Package Duration
                        </p>
                        <select
                            name="duration"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1_day">1 Day</option>
                            <option value="2_weeks">2 Weeks</option>
                            <option value="4_weeks">4 Weeks</option>
                        </select>
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

                    <!-- if duration > 1 day -->
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
                            <option value="more">More Bags</option>
                        </select>
                    </div>


                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Maximum Weight
                        </p>
                        <input
                            name="dry_clean_credit"
                            class="add-package-value"
                            placeholder="Maximum Weight"
                            type="number"
                            step="any"
                            min="0"
                        />
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

                    <!-- <div class="" style="margin-bottom: 20px">
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
                    </div> -->

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Drying Options
                        </p>
                        <select
                            name="dryer_option"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="tumble_dry">Tumble Dry</option>
                            <option value="air_dry">Air Dry</option>
                            <option value="air_dry_flat">Air Dry - Flat</option>
                            <option value="recommendation">As per Manufacturer Recommendation</option>
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
                            <option value="1">Folding Only</option>
                            <option value="2">Folding & Hanger</option>
                        </select>
                    </div> -->

                    <!-- <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Hangers Options
                        </p>
                        <select
                            name="folding_option"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="1">Hanger Per Bags (xx$ Per Bag)</option>
                            <option value="2">Hanger Per Piece (xx$ Per Piece)</option>
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
                            <option value="2">Special Line</option>
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
                            <option value="0">None</option>
                            <option value="1">Standard Line</option>
                            <option value="2">Special Line</option>
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
                            <option value="3">Special Line</option>
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
                            required
                        >
                            <option value="1">None</option>
                            <option value="2">1 Sheet</option>
                            <option value="3">Multiple Per Bag</option>
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
                            <option value="3">Special Line</option>
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
                            step="any"
                            min="0"
                            
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
                            step="any"
                            min="0"
                            
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
                            step="any"
                            min="0"
                            
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
                            step="any"
                            min="0"
                            
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
                            step="any"
                            min="0"
                            
                        />
                    </div>
                </div>

                <div class="price-card-container">
                    <div class="CreatePackagePriceCard">
                        <div class="title">Package Price</div>
                        <input class="package-price" readonly  type="number" step="any"  min="0" placeholder="Package Price">

                        <div class="button-container">
                            <button class="done" type="submit">Done</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>

        <!-- <p class="add-new-item" @click="addNewItemContainer()">
            Add Another Feature
        </p> -->
    </div>
</template>

<script>
import AddPackageItem from "./Components/AddPackageItem";
import CreatePackagePriceCard from "./Components/CreatePackagePriceCard";
import AddedValueContainer from "./Components/AddedValueContainer";

export default {
    props: ["title", "date", "addedvalues", "storepackageroute"],
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
        },
        storePackageInLocalStorage(event) {
            event.preventDefault();
            var formValues = $(".add-form").serialize();

            // var formData = JSON.parse(JSON.stringify($(".add-form").serializeArray())); 
            localStorage.setItem("createdPackage", formValues)
            console.log("Form Values: ", localStorage.getItem("createdPackage"));
            
            // axios({
            //     url: selectedURL,
            //     method: "POST",
            //     data: formValues
            // }).then(response => {
            //     console.log("data: ", response.data);
            //     if (response.data.success) {
            //         this.showSuccessMessage(response.data.message);
            //     }
            // });
        },
        showSuccessMessage(messageText) {
            $(".successMessage").removeClass("d-none");
            $(".successMessage").text(messageText);
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$orange: #ffa800;
$blue: #22aee4;



$white: #ffffff;
$red: #FF0000CC;
$green: #00C319;
$blue: #22AEE4;


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



.CreatePackagePriceCard{
    background: $white;
    width: 330px;
    height: 180px;
    margin-top: 24px;
    border: 1px solid #E7E7E7;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    background: $white;
    color: $blue;
    .title{
        font-size: 16px;
        font-family: 'Lato-Bold';
    }

    .package-price{
        width: 280px;
        height: 40px;
        background: #F9F9F9;
        padding: 13px 24px;
        border: 1px solid #EDEDED;
        border-radius: 7px;
        margin: 0 auto;
    }
    .price{
        font-size: 30px;
        margin: 12px 0;
        font-family: 'Lato-Bold';
    }    

    .button-container{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
            .done{
                width: 168px;
                height: 40px;
                background: $blue;
                color: $white;
                border-radius: 35px;
                font-size: 14px;
            }
        }

}
</style>
