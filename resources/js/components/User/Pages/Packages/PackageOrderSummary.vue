<template>
    <div class="PackageOrderSummary">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <p
            class="text-primary text-uppercase font-weight-bold font-size-20 mt-4"
        >
            Main Package Features
        </p>
        <div class="d-flex flex-column mt-4">
            <ItemSummary
                title="Package Duration"
                :value="package[0].package_duration"
            />
            <ItemSummary
                title="No. of Pickups"
                :value="package[0].no_of_pickups"
            />
            <ItemSummary title="No. of Bags" :value="package[0].no_of_bags" />
            <ItemSummary
                title="Maximum Weight"
                :value="package[0].max_weight"
            />
            <ItemSummary
                title="Return Duration"
                :value="package[0].return_duration"
            />
            <ItemSummary
                title="Dry Clean Credit"
                :value="package[0].dry_clean_credit"
            />
            <ItemSummary
                title="Added Value Services Credit"
                :value="package[0].added_value_service_credit"
            />
            <ItemSummary
                title="Reward Points"
                :value="package[0].reward_points"
            />
            <ItemSummary
                title="Price of Extra Pound"
                :value="package[0].price_of_extra_pound"
            />
            <ItemSummary
                title="Advance Notice"
                :value="package[0].advance_notice"
            />
            <ItemSummary title="Package Price" :value="package[0].price" />
            <div class="seperator"></div>
        </div>
        <p
            class="text-primary text-uppercase font-weight-bold font-size-20 mt-4"
        >
            Package Customizations
        </p>
        <br />

        <ItemSummary
            :title="
                package[0].no_of_pickups == 1
                    ? 'Week 1 Pickup Date'
                    : 'Week 1 Pickup Dates'
            "
            :value="package[0].week1_pickup_date"
        />
        <ItemSummary
            :title="
                package[0].no_of_pickups == 1
                    ? 'Week 2 Pickup Date'
                    : 'Week 2 Pickup Dates'
            "
            :value="package[0].week2_pickup_date"
        />
        <ItemSummary
            :title="
                package[0].no_of_pickups == 1
                    ? 'Week 3 Pickup Date'
                    : 'Week 3 Pickup Dates'
            "
            :value="package[0].week3_pickup_date"
        />
        <ItemSummary
            :title="
                package[0].no_of_pickups == 1
                    ? 'Week 4 Pickup Date'
                    : 'Week 4 Pickup Dates'
            "
            :value="package[0].week4_pickup_date"
        />

        <br />
        <div class="seperator"></div>
        <br />
        <ListItemSummary
            title="Dry Clean Items"
            :list="package[0].dry_clean_items"
            emptyhint="No Dry Clean Items Selected"
        />
        <br />
        <div class="seperator"></div>
        <br />
        <ItemSummary
            title="Added Value"
            :value="package[0].added_value[0].title"
        />
        <ListItemSummary
            title="Added Value Items"
            :list="package[0].added_value_choices"
            emptyhint="No Added Value Items Selected"
        />
        <br />
        <div class="seperator"></div>
        <br />
        <ListItemSummary
            title="Household Items"
            :list="package[0].household_items"
            emptyhint="No Household Items Selected"
        />

        <div class="seperator" style="margin-top: 50px"></div>
        <br />
        <ItemSummary
            title="Detergents Brand"
            :value="package[0].detergents_type[0].title"
        />
        <ListItemSummary
            title="Selected Item"
            :list="package[0].detergents_item"
            emptyhint="No Detergents Items Selected"
        />
        <br />
        <div class="seperator"></div>
        <br />

        <ItemSummary
            title="Fabric Softener Brand"
            :value="package[0].fabric_type[0].title"
        />
        <ListItemSummary
            title="Selected Item"
            :list="package[0].fabric_type_item"
            emptyhint="No Household Items Selected"
        />
        <br />
        <div class="seperator"></div>

        <br />
        <ItemSummary
            title="Dryer Sheet Brand"
            :value="package[0].dryer_sheet_type[0].title"
        />
        <ListItemSummary
            title="Selected Item"
            :list="package[0].dryer_sheet_item"
            emptyhint="No Dryer Sheet Items Selected"
        />
        <br />
        <div class="seperator"></div>
        <br />

        <ItemSummary
            title="Scent Booster Brand"
            :value="package[0].booster_type[0].title"
        />
        <ListItemSummary
            title="Selected Item"
            :list="package[0].booster_item"
            emptyhint="No Scent Booster Items Selected"
        />

        <br />
        <div class="seperator"></div>
        <br />
        <div class="col-lg-8 mx-auto my-2">
            <div
                class="d-flex flex-row flex-wrap w-100 justify-content-start align-items-center"
            >
                <p
                    class="item-title text-dark font-weight-bold"
                    style="font-size: 20px"
                >
                    TOTAL
                </p>
                <p class="item-value font-weight-bold" style="font-size: 20px">
                    {{ package[0].total }}$
                </p>
            </div>
        </div>
        <br>
        <div class="seperator"></div>

        <div class="d-flex flex-row justify-content-center mt-4 mb-2 py-4">
            <button
                class="btn btn-warning px-4 py-2 mb-4"
                style="border-radius: 20px"
                @click="goToPayment"
            >
                Go to payment page
            </button>
        </div>
    </div>
</template>

<script>
import ItemSummary from "./Components/ItemSummary";
import ListItemSummary from "./Components/ListItemSummary";
export default {
    data() {
        return {
            title: "Package Order Summary"
        };
    },
    props: ["date", "package", "paymentroute"],
    components: {
        ItemSummary,
        ListItemSummary
    },
    methods: {
        goToPayment() {
            var url = this.paymentroute.replace(
                "package_id",
                this.package[0].id
            );
            window.location.href = url;
        }
    }
};
</script>
<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;

.PackageOrderSummary {
    padding: 0 140px 0 16px;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 12px;
            font-weight: bold;
        }
        .date {
            font-size: 10px;
            color: $text-grey;
        }
    }

    .seperator {
        width: 100%;
        height: 1px;
        background: #ccc;
        margin: 20px auto;
    }
}
</style>
