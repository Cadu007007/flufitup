<template>
    <div class="AddPromocode">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <form action="/dummy" method="post">
            <input type="hidden" :value="csrf" name="_token" />
            <div class="form-container">
                <div class="input-row">
                    <p class="title">Promo Code :</p>
                    <input
                        type="text"
                        class="input"
                        name="code"
                        placeholder="Promocode"
                    />
                </div>

                <div class="input-row">
                    <p class="title">Target:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="target"
                    >
                        <option value="1">Main Services</option>
                        <option value="2">Added Value Service</option>
                        <option value="3">Dry Clean</option>
                        <option value="3">House Hold</option>
                    </select>
                </div>

                <div class="input-row">
                    <p class="title">Sub‐Target:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="sub_target"
                    >
                        <option value="1">List of Services</option>
                        <option value="2">List of AVS</option>
                        <option value="3">List of Dry Clean</option>
                        <option value="4">List of House Hold</option>
                        
                    </select>
                </div>
                <div class="input-row">
                    <p class="title">Targeted State:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="targeted_state"
                        multiple="multiple"
                    >
                        <option value="1">State 1</option>
                        <option value="2">State 2</option>
                        <option value="3">State 3</option>
                        
                    </select>
                </div>
                <div class="input-row">
                    <p class="title">Targeted County:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="targeted_country"
                        multiple="multiple"
                    >
                        <option value="1">Country 1</option>
                        <option value="2">Country 2</option>
                        <option value="3">Country 3</option>
                    </select>
                </div>
                <div class="input-row">
                    <p class="title">Targeted City:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="targeted_city"
                        multiple="multiple"
                    >
                        <option value="1">City 1</option>
                        <option value="2">City 2</option>
                        <option value="3">City 3</option>
                    </select>
                </div>
                
                
                <div class="input-row">
                    <p class="title">Promo Type:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="promo_type"
                    >
                        <option value="1">SAVE</option>
                        <option value="2">Seasonal</option>
                        <option value="3">Event</option>
                        <option value="4">Holiday</option>
                        <option value="5">Welcome</option>
                        
                    </select>
                </div>
                <div class="input-row">
                    <p class="title">Sub‐Promo:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="sub_promo"
                    >
                        <option value="1">Sub‐Promo 1</option>
                        <option value="2">Sub‐Promo 2</option>
                        <option value="3">Sub‐Promo 3</option>
                        
                    </select>
                </div>
                <div class="input-row">
                    <p class="title">Type of Use:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="type_of_use"
                    >
                        <option value="1">Single use</option>
                        <option value="2">Reusable</option>
                        
                    </select>
                </div>
                <div class="input-row">
                    <p class="title">Value Type:</p>
                    <select
                        class="select2"
                        style="width: 400px"
                        name="value_type"
                    >
                        <option value="1">Fixed Amount</option>
                        <option value="2">Discount Percentage</option>
                        
                    </select>
                </div>


                <div class="input-row">
                    <p class="title">Fixed Amount :</p>
                    <input
                        type="text"
                        class="input"
                        name="fixed_amount"
                        placeholder="$$$"
                    />
                </div>

                <div class="input-row">
                    <p class="title">Discount :</p>
                    <input
                        type="text"
                        class="input"
                        name="discount"
                        placeholder="%%%"
                    />
                </div>
                <div class="input-row">
                    <p class="title">No. of Codes :</p>
                    <input
                        type="text"
                        class="input"
                        name="no_of_codes"
                        placeholder="Set a number of how many customers to use the promotion"
                    />
                </div>

                <div class="input-row">
                    <p class="title">Start Date :</p>
                    <input
                        type="text"
                        :value="startDate"
                        class="input"
                        name="start_date"
                        placeholder="MM/DD/YYYY"
                        @click="showCalendar(1)"
                    />
                </div>
                <div class="input-row">
                    <p class="title">End Date :</p>
                    <input
                        type="text"
                        :value="endDate"
                        class="input"
                        name="end_date"
                        placeholder="MM/DD/YYYY"
                        @click="showCalendar(2)"
                    />
                </div>

                <div class="button-container">
                    <button class="save-button" type="submit">Save</button>
                </div>
            </div>
        </form>

        <div
            class="modal"
            v-if="activeCalendar == 1 || activeCalendar == 2"
            @keydown.esc="closeModal"
            tabindex="0"
        >
            <div class="calendar-container">
                <custom-datepicker
                    v-if="activeCalendar == 1"
                    @dateSelected="setStartDate($event)"
                    :date="startDate"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :headerStyles="headerStyles"
                />
                <custom-datepicker
                    v-if="activeCalendar == 2"
                    @dateSelected="setEndDate($event)"
                    :date="endDate"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :headerStyles="headerStyles"
                />
            </div>
        </div>
    </div>
</template>

<script>
import CustomDatepicker from "vue-custom-datepicker";
import moment from "moment";
export default {
    props: ["title", "date"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            activeCalendar: 0,
            startDate: "",
            endDate: "",
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
        "custom-datepicker": CustomDatepicker
    },
    methods: {
        setStartDate(date) {
            this.startDate = date;
            this.closeModal();
        },
        setEndDate(date) {
            this.endDate = date;
            this.closeModal();
        },
        showCalendar(no) {
            this.activeCalendar = no;
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        },
        closeModal() {
            this.activeCalendar = 0;
            document.getElementsByTagName("body")[0].style.overflow = "auto";
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$blue: #22aee4;
$white: #fff;

.AddPromocode {
    width: 100%;
    height: 100%;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }
    .form-container {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        margin: 20px auto;
        position: relative;
        .input-row {
            width: 812px;
            display: grid;
            grid-template-columns: 160px auto;
            margin: 5px auto;
            .title {
                color: $text-grey;
                font-size: 16px;
                font-family: "Open-Sans-Semibold";
            }
            .input {
                width: auto;
                max-width: 628px;
                background: #f9f9f9;
                border: 2px solid #ededed;
                border-radius: 7px;
                padding: 12px;
            }
        }
    }
    .button-container {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        .save-button {
            width: 200px;
            height: 40px;
            font-size: 18px;
            background: $blue;
            box-shadow: 2px 2px 4px #00000033;
            border-radius: 35px;
            color: #fff;
        }
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
            height: 31px;
            color: $white;
            font-size: 14px;
            font-family: "Lato-Bold";
            background: $blue;
            border-radius: 35px;
            margin: 10px auto 25px;
        }
    }
    .modal {
        width: 100%;
        height: 100%;
        background: rgba($color: #000000, $alpha: 0.6);
        position: absolute;
        top: 0;
        left: 0;
    }
}
</style>
