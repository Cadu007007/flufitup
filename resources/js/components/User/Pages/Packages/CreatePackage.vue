<template>
    <div class="AddPackage">
        <div
            class="alert alert-success mt-3 text-center d-none successMessage"
        ></div>
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <form
            method="post"
            class="add-form"
            @submit="storePackageInLocalStorage($event)"
        >
            <input type="hidden" :value="csrf" name="_token" />

            <div class="flex-row">
                <div class="flex-column">
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                           Choose Your Package Duration
                        </p>
                        <select
                            name="duration"
                            id=""
                            class="select2 packageDuration"
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
                    <div
                        class=""
                        style="margin-bottom: 20px"
                        v-show="selectedDuration != '1_day'"
                    >
                        <p class="title" style="margin-bottom: 10px">
                            No. of Pickups Per Week
                        </p>
                        <select
                            name="no_pickups"
                            id=""
                            class="select2 pickupsDropdown"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">1 Pickup</option>
                            <option value="2">2 Pickup</option>
                        </select>
                    </div>

                    <!-- 1 day calendar -->
                    <p
                        class="option-label my-3 font-size-18 w-75 text-primary"
                        @click="openCalendar()"
                        v-show="selectedDuration == '1_day'"
                    >
                        Select Your Pickup Date
                        <span class="ml-2 date">{{ selectedDate1 }}</span>
                    </p>
                    <div class="1-day-calendar">
                        <input
                        class="1day-date"
                            type="text"
                            name="pickup_date"
                            required
                            v-model="selectedDate1"
                            style="opacity: 0;margin-top: -40px;position: absolute;z-index: -1;"
                        />
                        <div
                            class="calendars-modal"
                            id="calendarsModal"
                            v-if="showmodal"
                            @keydown.esc="closeModal"
                            tabindex="0"
                        >
                            <div
                                class="calendar-container"
                                v-show="selectedDuration == '1_day'"
                            >
                                <!-- <input
                                    type="text"
                                    name="pickup_date"
                                    v-model="pickupdate"
                                /> -->
                                <p class="calendar-title">Please Select Your Pickup Date/s</p>
                                <custom-datepicker
                                    @dateSelected="setDate($event)"
                                    :date="selectedDate1"
                                    :primaryColor="primaryColor"
                                    :wrapperStyles="wrapperStyles"
                                    :headerStyles="headerStyles"
                                />
                                <button
                                    type="button"
                                    class="calender-button"
                                    @click="handleCalendarAndCloseModal()"
                                >
                                    Done
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="mb-3"
                        v-if="
                            selectedpickups > 0 && selectedDuration != '1_day'
                        "
                    >
                        <Accordion-Calendar
                            :pickups="selectedpickups"
                            class="accordion"
                            :hasradio="false"
                            title="Choose your date"
                            :options="weeks"
                        />
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Select how many bags per pickup
                        </p>
                        <select
                            name="bags_per_pickup"
                            id=""
                            class="select2 bagsDropdown"
                            style="width:300px; margin-top: 20px"
                            required
                        >
                            <option value="1">1 Bag</option>
                            <option value="2" selected>2 Bags</option>
                            <option value="3">3 Bags</option>
                            <option value="4">4 Bags</option>
                            <option value="5">5 Bags</option>
                            <option value="6">6 Bags</option>
                            <option value="7">7 Bags</option>
                            <option value="8">8 Bags</option>
                            <option value="9">9 Bags</option>
                            <option value="10">10 Bags</option>
                            <option value="more">More Bags</option>
                        </select>
                        <input
                            class="add-package-value"
                            id="moreBags"
                            type="number"
                            name="more_bags"
                            min="11"
                        />
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Maximum allowed weight per pickup
                        </p>
                        <input
                            name="dry_clean_credit"
                            class="add-package-value"
                            id="maxWeightInput"
                            placeholder="Maximum Weight"
                            type="text"
                            readonly
                        />
                    </div>

                    <div
                        class=""
                        style="margin-bottom: 20px"
                        v-show="selectedDuration != '1_day'"
                    >
                        <p class="title" style="margin-bottom: 10px">
                            Total No. of Bags per package
                        </p>
                        <input
                            name="total_pages"
                            class="add-package-value"
                            id="totalBags"
                            placeholder="Total No. of Bags per package"
                            type="text"
                            v-model="totalbags"
                            readonly
                        />
                    </div>

                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Select your desired Service Return Duration
                        </p>
                        <select
                            name="return_service"
                            id=""
                            class="select2 returnService"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="48" selected>48 Hours</option>
                            <option value="24">24 Hours</option>
                            <option value="12">12 Hours</option>
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
                            Select your laundry drying method
                        </p>
                        <select
                            name="dryer_option"
                            id=""
                            class="select2 dryerOption"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="recommendation" selected
                                >As per Manufacturer Recommendation</option
                            >
                            <option value="tumble_dry">Tumble Dry</option>
                            <option value="air_dry">Air Dry</option>
                            <option value="air_dry_flat">Air Dry - Flat</option>
                        </select>
                    </div>
                    <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Select your clean laundry setup
                        </p>
                        <select
                            name="folding_option foldingOption"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
                        >
                            <option value="folding" selected
                                >Folding Only</option
                            >
                            <option value="folding_hanger"
                                >Folding&Hangers</option
                            >
                        </select>
                    </div>

                    <div class="slider-container detergentSlider">
                        <div
                            class="title font-weight-bold my-4 text-center text-primary"
                        >
                            Select your preferred laundry Detergent
                        </div>
                        <Slider
                            @itemclicked="detergentitemclicked"
                            @slidechanged="detergentslidechanged"
                            :perpage="3"
                            :types="detergentstypes"
                            :typesitems="this.detergentstypes.map(x=>x.detergents)"
                        />

                        <input
                            type="hidden"
                            class="hidden-item"
                            id="selectedDetergents"
                        />
                    </div>

                    <div class="slider-container fabricSlider">
                        <div
                            class="title font-weight-bold my-4 text-center text-primary"
                        >
                            Select your preferred Fabric Softener
                        </div>
                        <Slider
                            @itemclicked="fabricitemclicked"
                            @slidechanged="fabricslidechanged"
                            :perpage="3"
                            :types="fabrictypes"
                            :typesitems="this.fabrictypes.map(x => x.fabrics)"
                        />

                        <input
                            type="hidden"
                            class="hidden-item"
                            id="selectedFabric"
                        />
                    </div>

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

                    <!-- <div class="" style="margin-bottom: 20px">
                        <p class="title" style="margin-bottom: 10px">
                            Laundry Detergent
                        </p>
                        <select
                            name="detergent_id"
                            id=""
                            class="select2"
                            style="width:300px; margin-top: 20px"
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
                        >
                            <option value="1">None</option>
                            <option value="2">1 Sheet</option>
                            <option value="3">Multiple Per Bag</option>
                        </select>
                    </div> -->



                      

                    <!-- <div class="question-container">
                        <p class="question">
                            Add Nature friendly garment Freshener ( Only for
                            1.5s per bag )
                        </p>
                        <div class="answers">
                            <div class="answer">
                                <input
                                    class="radio natureRadio"
                                    type="radio"
                                    name="add_nature_garment"
                                    value="yes"
                                    id=""
                                />
                                <label
                                    class="option-label"
                                    for="add_nature_garment"
                                    >Yes</label
                                >
                            </div>
                            <div class="answer">
                                <input
                                    class="radio natureRadio"
                                    type="radio"
                                    checked
                                    name="add_nature_garment"
                                    value="no"
                                    id=""
                                />
                                <label
                                    class="option-label"
                                    for="add_nature_garment"
                                    >No</label
                                >
                            </div>
                        </div>
                    </div> -->

                    <!-- Freshner -->
                    
                      <div class="question-container">
                            
                            <p class="question">
                                Add Nature friendly garment Freshener ( Only for
                            1.5s per bag )
                            </p>
                            <div class="answers">
                                <div class="answer">
                                    <input
                                        class="radio"
                                        type="radio"
                                        name="add_fabric"
                                        value="yes"
                                        id=""
                                    />
                                    <label
                                        class="option-label"
                                        for="add_fabric"
                                        >Yes</label
                                    >
                                </div>
                                <div class="answer">
                                    <input
                                        class="radio"
                                        type="radio"
                                        checked
                                        name="add_fabric"
                                        value="no"
                                        id=""
                                    />
                                    <label
                                        class="option-label"
                                        for="add_fabric"
                                        >No</label
                                    >
                                </div>
                            </div>
                        </div>
                        
                    <div class="" style="margin-bottom: 20px" v-show="showfabric">
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

                    <div class="drycleanContainer">
                        <div class="question-container">
                            
                            <p class="question">
                                Add Dry Clean Items
                            </p>
                            <div class="answers">
                                <div class="answer">
                                    <input
                                        class="radio"
                                        type="radio"
                                        name="add_dry_clean"
                                        value="yes"
                                        id=""
                                    />
                                    <label
                                        class="option-label"
                                        for="add_dry_clean"
                                        >Yes</label
                                    >
                                </div>
                                <div class="answer">
                                    <input
                                        class="radio"
                                        type="radio"
                                        checked
                                        name="add_dry_clean"
                                        value="no"
                                        id=""
                                    />
                                    <label
                                        class="option-label"
                                        for="add_dry_clean"
                                        >No</label
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mx-auto my-4" v-show="isdrycleanselected">
                            <ItemsList
                                
                                title="Dry Clean"
                                :items="drycleanitems"
                            />
                        </div>
                    </div>

                    <div class="householdContainer">
                        <div class="question-container">
                            <p class="question">
                                Add Household Items
                            </p>
                            <div class="answers">
                                <div class="answer">
                                    <input
                                        class="radio"
                                        type="radio"
                                        name="add_household"
                                        value="yes"
                                        id=""
                                    />
                                    <label
                                        class="option-label"
                                        for="add_household"
                                        >Yes</label
                                    >
                                </div>
                                <div class="answer">
                                    <input
                                        class="radio"
                                        type="radio"
                                        checked
                                        name="add_household"
                                        value="no"
                                        id=""
                                    />
                                    <label
                                        class="option-label"
                                        for="add_household"
                                        >No</label
                                    >
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-lg-12 mx-auto my-4"
                            v-show="ishouseholdselected"
                        >
                            <ItemsList
                                title="Household Items"
                                :items="householditems"
                            />
                        </div>
                    </div>

                    <!-- <div class="" style="margin-bottom: 20px">
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
                    </div> -->

                    <!-- <div class="" style="margin-bottom: 20px">
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
                    </div> -->

                    <!-- <div class="" style="margin-bottom: 20px">
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
                    </div> -->
                    <!-- <div class="" style="margin-bottom: 20px">
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
                    </div> -->
                    <!-- <div class="" style="margin-bottom: 20px">
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
                    </div> -->
                </div>

                <div class="price-card-container">
                    <div class="CreatePackagePriceCard">
                        <div class="title">Package Price</div>
                        <input
                            class="package-price"
                            readonly
                            type="number"
                            step="any"
                            min="0"
                            placeholder="Package Price"
                        />

                        <div class="button-container">
                            <button
                                class="done"
                                data-agree="false"
                                type="submit"
                            >
                                Done
                            </button>
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
import CustomDatepicker from "vue-custom-datepicker";

import AddPackageItem from "./Components/AddPackageItem";
import CreatePackagePriceCard from "./Components/CreatePackagePriceCard";
import AddedValueContainer from "./Components/AddedValueContainer";
import AccordionCalendar from "./Components/AccordionCalendar";

import ItemsList from "./Components/ItemsList";
import Slider from "./Components/Slider";

export default {
    mounted() {
        setTimeout(() => {
            // console.log("detergentstypes: ", this.detergentstypes);
            console.log(
                "detergentstypes map: ",
                this.detergentstypes.map(x => x.detergents)
            );

            $(".pickupsDropdown").on("change", () => {
                this.selectedpickups = $(".pickupsDropdown").val();
                this.sumTotalBags();
            });

            $(".returnService").on("change", () => {
                this.sumPackageTotal();
            });

            $(".packageDuration").on("change", () => {
                let selectedDurationValue = $(".packageDuration").val();
                this.selectedDuration = selectedDurationValue;
                console.log("selectedDurationValue: ", selectedDurationValue);
                if (selectedDurationValue == "2_weeks") {
                    this.weeks = 2;
                    /* remove required from 1 day date */
                    $(".1day-date").removeAttr("required")
                    /* add required to weeks inputs */
                    $("#week1Input").attr("required", true)
                    $(".week1-input").attr("required",true)
                    $(".week2-input").attr("required",true)
                } else if (selectedDurationValue == "4_weeks") {
                    this.weeks = 4;
                    /* remove required from 1 day date */
                    $(".1day-date").removeAttr("required")
                    /* add required to weeks inputs */
                    $(".week1-input").attr("required",true)
                    $(".week2-input").attr("required",true)
                    $(".week3-input").attr("required",true)
                    $(".week4-input").attr("required",true)
                } else {
                    this.weeks = 0;
                    /* remove required from 1 day date */
                    $(".1day-date").attr("required", true)
                    /* add required to weeks inputs */
                    $(".week1-input").removeAttr("required",true)
                    $(".week2-input").removeAttr("required",true)
                    $(".week3-input").removeAttr("required",true)
                    $(".week4-input").removeAttr("required",true)
                }
                $(".pickupsDropdown").change();
            });

            $(".bagsDropdown")
                .on("change", () => {
                    let selectedBagsValue = $(".bagsDropdown").val();
                    if (selectedBagsValue == "more") {
                        $("#moreBags")
                            .removeAttr("hidden")
                            .attr("required", true)
                            .val(11)
                            .change();
                    } else {
                        $("#moreBags")
                            .removeAttr("required")
                            .attr("hidden", true)
                            .val(null);
                        $("#maxWeightInput").val(
                            selectedBagsValue * 15 + " Pounds"
                        );
                    }
                    $(
                        "input[type=radio][name=add_nature_garment]:checked"
                    ).trigger("change");
                    this.sumTotalBags();
                })
                .trigger("change");
            $("#moreBags").on("change", () => {
                let selectedBagsValue = $("#moreBags").val();
                if (selectedBagsValue > 0) {
                    $("#maxWeightInput").val(
                        selectedBagsValue * 15 + " Pounds"
                    );
                }
                $("input[type=radio][name=add_nature_garment]:checked").trigger(
                    "change"
                );
                this.sumTotalBags();
            });

            $(".option-label").click(function() {
                $(this)
                    .parent()
                    .find(".radio")
                    .click();

                let selectedValue = $(this)
                    .parent()
                    .find(".radio")
                    .val();

                console.log("selectedValue: ", selectedValue);

                if (selectedValue == "no") {
                    $(this)
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .find(".checkbox")
                        .each((index, item) => {
                            console.log("Item: ", $(item).prop("checked"));
                            $(item).prop("checked", false);
                        });
                }
            });

            /* Nature changed */
            $("input[type=radio][name=add_nature_garment]").change(event => {
                let selectedValue = event.target.value;
                this.bagsprice = 0;
                console.log("selectedValue: ", selectedValue);
                if (selectedValue == "yes") {
                    /* calculate bags price */
                    let bagsSelectedCount = 0;
                    let bagsCount = $(".bagsDropdown").val();
                    if (bagsCount == "more") {
                        bagsSelectedCount = $("#moreBags").val();
                    } else {
                        bagsSelectedCount = bagsCount;
                    }
                    this.bagsprice = bagsSelectedCount * 1.5;
                } else {
                    this.bagsprice = 0;
                }

                this.sumPackageTotal();
            });
            $("input[type=radio][name=add_fabric]").change(event => {
                let selectedValue = event.target.value;
                this.showfabric = selectedValue == "yes" ? true : false;
                this.sumPackageTotal();
            });
            $("input[type=radio][name=add_dry_clean]").change(event => {
                let selectedValue = event.target.value;
                this.isdrycleanselected = selectedValue == "yes" ? true : false;
                this.sumPackageTotal();
            });
            $("input[type=radio][name=add_household]").change(event => {
                let selectedValue = event.target.value;
                this.ishouseholdselected =
                    selectedValue == "yes" ? true : false;
                this.sumPackageTotal();
            });

 $("input[type=radio][name=add_household]").change(event => {
                let selectedValue = event.target.value;
                this.ishouseholdselected =
                    selectedValue == "yes" ? true : false;
                this.sumPackageTotal();
            });


            $(".checkbox").click(() => {
                this.sumPackageTotal();
            });
            $(".radio").click(() => {
                this.sumPackageTotal();
            });

            $(".slide-type").click(() => {
                console.log("TEST: ", $(this));
                this.sumPackageTotal();
            });
        }, 500);
    },
    props: [
        "title",
        "date",
        "addedvalues",
        "storepackageroute",
        "detergentstypes",
        "fabrictypes",
        "drycleanitems",
        "householditems"
    ],
    data() {
        return {
            // detergentstypesitems: this.detergentstypes.map(x.detergents),
            // fabrictypesitems: this.fabrictypes.map(x => x.fabrics),
            showmodal: false,

            name: "",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            selectedpickups: 0,
            selectedDuration: "1_day",
            weeks: 2,
            totalbags: 1,
            isdrycleanselected: false,
            ishouseholdselected: false,
            showfabric: false,
            bagsprice: 0,
            selectedDate1: "",
            pickupdate: "",

            wrapperStyles: { width: "100%" },
            headerStyles: {
                width: "350px",
                margin: "0 auto",
                background: "#fff",
                color: "#000",
                fontWeight: "bolder",
                fontFamiley: "Lato-Bold"
            },
            primaryColor: "#FDBD42"
        };
    },
    components: {
        AddPackageItem,
        CreatePackagePriceCard,
        AddedValueContainer,
        AccordionCalendar,
        ItemsList,
        Slider,
        "custom-datepicker": CustomDatepicker
    },
    methods: {
        openCalendar() {
            this.opencalendar = true;
            this.showmodal = true;
        },
        handleCalendarAndCloseModal() {
            this.closeModal();
        },
        closeModal() {
            // hide modal and enable body scrolling
            this.showmodal = false;
            document.getElementsByTagName("body")[0].style.overflowX = "hidden";
        },

        setDate(date) {
            this.selectedDate1 = this.formatDate(date);
        },
        formatDate(date){
            console.log(date);
            let dateArray = date.split('-')
            let year =dateArray[0]
            let month =dateArray[1]
            let day =dateArray[2]
            let formatedDate = `${month}/${day}/${year}`
            return formatedDate
            // console.log(`${month}/${day}/${year}`);

        },
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
            // alert("SUBMIt");
            event.preventDefault();
            var formValues = $(".add-form").serialize();

            // var formData = JSON.parse(JSON.stringify($(".add-form").serializeArray()));
            localStorage.setItem("createdPackage", formValues);
            console.log(
                "Form Values: ",
                localStorage.getItem("createdPackage")
            );

window.location.href = window.location.href
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
        },
        pickupsChanged(event) {
            alert($(event.target).val());
        },
        sumTotalBags() {
            /* duration */
            let selectedDueation = this.weeks;
            let selectedPickups = this.selectedpickups;
            let selectedBags;
            if ($(".bagsDropdown").val() == "more") {
                selectedBags = $("#moreBags").val();
            } else {
                selectedBags = $(".bagsDropdown").val();
            }
            this.totalbags = selectedDueation * selectedPickups * selectedBags;
        },
        detergentitemclicked(id) {
            $("#selectedDetergents").val(id);
            this.sumPackageTotal();
        },
        fabricitemclicked(id) {
            $("#selectedFabric").val(id);
            this.sumPackageTotal();
        },
        detergentslidechanged() {
            $("#selectedDetergents").val(null);
            this.sumPackageTotal();
        },
        fabricslidechanged() {
            $("#selectedFabric").val(null);
            this.sumPackageTotal();
        },
        natureChanged(radioElement) {},

        slidechanged() {
            alert("Slide Changed");
        },
        sumPackageTotal() {
            setTimeout(() => {
                /* get selected detergents and house hold */
                let packagePrice = 0;
                let detergentsOrSoftenerCount = 0;
                $(".detergentSlider .item-container").each((index, item) => {
                    if ($(item).hasClass("selected-item")) {
                        let itemPrice = $(item).data("price");
                        console.log("Detergent Item Price: ", itemPrice);
                        packagePrice += parseFloat(itemPrice);
                        detergentsOrSoftenerCount++;
                    }
                });

                $(".fabricSlider .item-container").each((index, item) => {
                    if ($(item).hasClass("selected-item")) {
                        let itemPrice = $(item).data("price");
                        console.log("Fabrics Item Price: ", itemPrice);

                        packagePrice += parseFloat(itemPrice);
                        detergentsOrSoftenerCount++;
                    }
                });

                $(".checkbox:checked").each((index, item) => {
                    let itemPrice = $(item).data("price");
                    packagePrice += parseFloat(itemPrice);
                });
                console.log("bagsprice: ", this.bagsprice);
                packagePrice += parseFloat(this.bagsprice);

                /* add % about selected duration */
                let percentage = 0;
                let selectedReturnValue = $(".returnService").val();
                if (selectedReturnValue == 12) {
                    percentage = 0.45;
                    /* alert if air selected */

                    let dryerValue = $(".dryerOption").val();
                    if (
                        dryerValue == "air_dry" ||
                        dryerValue == "air_dry_flat"
                    ) {
                        $("button[type=submit]").attr("disabled", true);
                        alert(
                            "Selected drying option is not suitable for 12hrs return service"
                        );
                    } else {
                        $("button[type=submit]").removeAttr("disabled");
                    }
                } else if (selectedReturnValue == 24) {
                    percentage = 0.25;
                }

                let selectedBags = $(".bagsDropdown").val();
                let enteredBags = 0;
                if (selectedBags == "more") {
                    enteredBags = $("#moreBags").val();
                } else {
                    enteredBags = selectedBags;
                }
                /* folding */
                if ($(".foldingOption").val() == "folding_hanger") {
                    packagePrice += 5 * enteredBags;
                }

                /* detergents or softener */
                if (detergentsOrSoftenerCount > 0) {
                    packagePrice += 0.5 * enteredBags;
                }

                /* garment freshener */
                let selectedNatureGarment = $(
                    "input[name=add_nature_garment]:checked"
                ).val();
                if (selectedNatureGarment == "yes") {
                    packagePrice += 1.5 * enteredBags;
                }

                /* if dry clean or household selected .. confirm */
                if (
                    $("input[name=add_dry_clean]:checked").val() == "yes" ||
                    $("input[name=add_household]:checked").val() == "yes"
                ) {
                    if ($("button[type=submit]").attr("data-agree") != "true") {
                        $("button[type=submit]").attr("disabled", true);
                        if (
                            confirm(
                                "Service price will be added to the final invoice total after counting dry clean/household items, agree?"
                            )
                        ) {
                            $("button[type=submit]").removeAttr("disabled");
                            $("button[type=submit]").attr("data-agree", "true");
                        }
                    }
                }

                console.log("percentage: ", percentage);
                let percentageValue = packagePrice * percentage
                console.log("percentageValue: ", percentageValue);
                packagePrice += parseFloat(percentageValue) 

                console.log("packagePrice Final: ", packagePrice);
                $(".package-price").val(packagePrice);
            }, 500);
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$orange: #ffa800;
$blue: #22aee4;

$white: #ffffff;
$red: #ff0000cc;
$green: #00c319;
$blue: #22aee4;

$text-grey: #00000066;
$black: #000000;
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

        .question-container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            width: 520px;
            margin: 40px 0;
            .question {
                font-size: 18px;
                font-family: "Lato-Bold";
                color: $black;
            }
            .answers {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: flex-start;
                .answer {
                    width: 80px;
                    margin-top: 12px;
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    align-items: center;
                    .option-label {
                        margin-left: 10px;
                    }
                    .radio {
                        width: 24px;
                        height: 24px;
                    }
                }
            }
        }
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

.CreatePackagePriceCard {
    background: $white;
    width: 330px;
    height: 180px;
    margin-top: 24px;
    border: 1px solid #e7e7e7;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    background: $white;
    color: $blue;
    .title {
        font-size: 16px;
        font-family: "Lato-Bold";
    }

    .package-price {
        width: 280px;
        height: 40px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
        margin: 0 auto;
    }
    .price {
        font-size: 30px;
        margin: 12px 0;
        font-family: "Lato-Bold";
    }

    .button-container {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
        .done {
            width: 168px;
            height: 40px;
            background: $blue;
            color: $white;
            border-radius: 35px;
            font-size: 14px;
        }
    }
}

.calendars-modal {
    background: rgba($color: #000000, $alpha: 0.5);
    position: fixed;
    z-index: 3;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
}
.calendar-container {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    background: $white;
    width: 600px;
    margin: 100px auto;
    border-radius: 30px;
    .calendar-title {
        text-align: left;
        margin: 20px auto 0 auto;
        font-weight: bold;
        color: $blue;
        width: 90%;
    }
    .calender-button {
        width: 160px;
        height: 51px;
        color: $white;
        font-size: 14px;
        font-family: "Lato-Bold";
        background: $blue;
        border-radius: 35px;
        margin: 10px auto 25px;
    }
}
.cd-body-wrapper {
    margin: 10px auto !important;
    background: #fff;
}
.cd-body-wrapper header button {
    background: #22aee4;
    border-radius: 20px;
}
/* override calendar accordion styles */
.AccordionCalendar {
    border-radius: 15px;
}
.AccordionCalendar .header {
    background: #fff !important;
    border-radius: inherit;
}
.AccordionCalendar .options {
    padding: 10px 0 !important;
    border-top: 1px solid #eee;
}
.AccordionCalendar .options .option {
    margin-bottom: 10px;
}
.AccordionCalendar .options .option .option-label {
    margin-left: 30px !important;
}
</style>
