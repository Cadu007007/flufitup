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
                @go-to-payment="showPackageCustomization"
            />
        </div>

        <div class="d-flex flex-column" v-if="showCustomization">
            <div class="seperator"></div>
            <div class="row d-flex justify-content-center">
                <p class="title customization-title my-4 text-center col-lg-12 w-100">
                    Package Customizations
                </p>
                <div class="col-lg-8">
                    <Accordion-Calendar
                        :pickups="pickups"
                        class="accordion"
                        :hasradio="false"
                        title="Choose your date"
                        :options="4"
                    />
                </div>
            </div>
            <div class="col-lg-8 mx-auto my-4">
                <ItemsList title="Dry Clean" :items="drycleanitems" />
            </div>
            <div class="col-lg-8 mx-auto">
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
            <div class="slider-container">
                <div class="title font-weight-bold my-4 text-center text-primary">Detergents</div>
                <Slider :perpage="3" :types="detergentstypes" :typesitems="detergentstypesitems" />
            </div>
            <div class="slider-container">
                <div class="title font-weight-bold my-4 text-center text-primary">Fabric Softener</div>
                <Slider :perpage="3" :types="fabrictypes" :typesitems="fabrictypesitems" />
            </div>
            <div class="slider-container">
                <div class="title font-weight-bold my-4 text-center text-primary">Dryer Sheet</div>
                <Slider :perpage="3" :types="dryertypes" :typesitems="dryertypesitems" />
            </div>
            <div class="slider-container">
                <div class="title font-weight-bold my-4 text-center text-primary">Scent Booster</div>
                <Slider :perpage="3" :types="boostertypes" :typesitems="boostertypesitems" />
            </div>


        <div class="d-flex flex-row justify-content-center">
            <button class="btn btn-primary px-4 py-2 mb-4" 
            style="border-radius: 20px" @click="goToSummary">
                Go to Summary page
            </button>
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
import Slider from "./Components/Slider";

export default {
    data() {
        return {
            title: "Package Summary",
            calendarAccordionState: false,
            pickups: 1,
            showCustomization: false,
            
        };
    },
    props: [
        "date",
        "package",
        "paymentroute",
        "summaryroute",
        "drycleanitems",
        "householditems",
        "addedvalueoptions",
        "addedvaluechoices",
        "detergentstypes",
        "detergentstypesitems",
        "fabrictypes",
        "fabrictypesitems",
        "dryertypes",
        "dryertypesitems",
        "boostertypes",
        "boostertypesitems",
    ],
    components: {
        PackageDetailsCard,
        PackagePriceCard,
        AccordionCalendar,
        ItemsList,
        AddedValuesAccordion,
        Slider
    },
    methods: {
        goToSummary() {
            var url = this.summaryroute.replace(
                "package_id",
                this.package[0].id
            );
            window.location.href = url;
        },
        goToPayment() {
            var url = this.paymentroute.replace(
                "package_id",
                this.package[0].id
            );
            window.location.href = url;
        },
        showPackageCustomization(){
            this.calendarAccordionState = true;
            this.showCustomization = true;
        },
        
    }
};
</script>
<style lang="scss">
$text-grey: #00000066;
$blue: #22AEE4;

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
    .slider-container{
        width: 700px;
        margin: 0 auto;

    }
    .customization-title{
        font-family: 'Lato-Bold';
        font-size: 18px;
        color: $blue;
        margin-bottom: 24px;;
    }
    .seperator {
        width: 100%;
        height: 1px;
        background: #ccc;
        margin: 20px auto;
    }
}
</style>
