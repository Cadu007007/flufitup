<template>
    <div class="PackageSummary">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="page-container">
            <PackageDetailsCard class="package-details" :package="package" />

            <PackagePriceCard
                class="package-price"
                :price="package[0].price"
                :currency="package[0].currency"
                @go-to-payment="showCalendarAccordion"
            />
        </div>

        <div class="d-flex flex-column">
            <div class="row d-flex justify-content-center">
                <p class="title my-4 text-center col-lg-12 w-100">
                    Packages Customizations
                </p>
                <div class="col-lg-6">
                    <Accordion-Calendar
                        :pickups="pickups"
                        class="accordion"
                        :hasradio="false"
                        title="Choose your date"
                        :options="dateoptions"
                    />
                </div>
            </div>
            <div class="col-lg-8 mx-auto my-4">
                <ItemsList title="Dry Clean" :items="drycleanitems" />
            </div>
            <div class="col-lg-6 mx-auto">
                <AddedValuesAccordion
                    class="accordion"
                    title="Choose your Add Value Services"
                    name="added_value"
                    :options="addedvalueoptions"
                    :addedvaluechoices="addedvaluechoices"
                    :isopen="true"
                />
            </div>
            <div class="col-lg-8 mx-auto my-4">
                <ItemsList title="Household Items" :items="householditems" />
            </div>
        </div>
    </div>
</template>

<script>
import PackageDetailsCard from "./Components/PackageDetailsCard";
import PackagePriceCard from "./Components/PackagePriceCard";
import AccordionCalendar from "./Components/AccordionCalendar";
import ItemsList from "./Components/ItemsList";
import AddedValuesAccordion from "./Components/AddedValuesAccordion";

export default {
    data() {
        return {
            title: "Package Summary",
            calendarAccordionState: false
        };
    },
    props: [
        "date",
        "package",
        "paymentroute",
        "drycleanitems",
        "householditems",
        "addedvalueoptions",
        "addedvaluechoices"
    ],
    components: {
        PackageDetailsCard,
        PackagePriceCard,
        AccordionCalendar,
        ItemsList,
        AddedValuesAccordion
    },
    methods: {
        goToPayment() {
            var url = this.paymentroute.replace(
                "package_id",
                this.package[0].id
            );
            window.location.href = url;
        },
        showCalendarAccordion() {
            this.calendarAccordionState = true;
        }
    }
};
</script>
<style lang="scss">
$text-grey: #00000066;

.PackageSummary {
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

    .page-container {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        flex-wrap: wrap;
        .package-details {
            margin: 8px 4px 8px 0;
        }
        .package-price {
            margin: 8px 0 8px 0px;
        }
    }
}
</style>
