<template>
    <div class="AccordionCalendar">
        <div class="header" @click="changeIsOpenState()">
            <p class="title">{{ title }}</p>
            <img
                :src="
                    isopen || openstate
                        ? '/images/icons/arrow-up.svg'
                        : '/images/icons/arrow-down.svg'
                "
                alt=""
            />
        </div>
        <div class="options" v-show="isopen || openstate">
            <div class="option">
                <p class="option-label" @click="openCalendar(1)">
                    Week 1
                    <span class="date"
                        >{{ selectedDate1 }}
                        {{ selectedDate2 ? " & " + selectedDate2 : "" }}
                    </span>
                </p>
                <input
                    type="text" style="opacity: 0"
                    name="week1_pickup_dates"
                    required
                    class="week1-input"
                    :value="
                        selectedDate2
                            ? selectedDate1 + ';' + selectedDate2
                            : selectedDate1
                    "
                />
            </div>

            <div class="option">
                <p class="option-label" :class="!selectedDate1 ? 'in-active' : '' " @click="selectedDate1 ? openCalendar(2) : ''">
                    Week 2
                    <span class="date"
                        >{{ selectedDate3 }}
                        {{ selectedDate4 ? " & " + selectedDate4 : "" }}
                    </span>
                </p>
                <input
                    type="text" style="opacity: 0"
                    name="week2_pickup_dates"
                    required
                    class="week2-input"
                    :value="
                        selectedDate4
                            ? selectedDate3 + ';' + selectedDate4
                            : selectedDate3
                    "
                />
            </div>

            <div class="option" v-show="options > 2">
                <p class="option-label"  :class="!selectedDate3 ? 'in-active' : '' " @click="selectedDate3 ? openCalendar(3) : ''">
                    Week 3
                    <span class="date"
                        >{{ selectedDate5 }}
                        {{ selectedDate6 ? " & " + selectedDate6 : "" }}
                    </span>
                </p>
                <input
                    type="text" style="opacity: 0"
                    name="week3_pickup_dates"
                    required
                    class="week3-input"
                    :value="
                        selectedDate6
                            ? selectedDate5 + ';' + selectedDate6
                            : selectedDate5
                    "
                />
            </div>

            <div class="option" v-show="options > 2">
                <p class="option-label" :class="!selectedDate5 ? 'in-active' : '' " @click="selectedDate5 ? openCalendar(4) : ''">
                    Week 4
                    <span class="date"
                        >{{ selectedDate7 }}
                        {{ selectedDate8 ? " & " + selectedDate8 : "" }}
                    </span>
                </p>
                <input
                    type="text" style="opacity: 0"
                    name="week4_pickup_dates"
                    required
                    class="week4-input"
                    :value="
                        selectedDate8
                            ? selectedDate7 + ';' + selectedDate8
                            : selectedDate7
                    "
                />
            </div>
        </div>

        <div class="calendars-modal" id="calendarsModal" v-if="showmodal" @keydown.esc="closeModal"  tabindex="0">
            <!-- First Week -->
            <div class="calendar-container" v-if="showweek1pickup1calendar">
                <p class="calendar-title">Week 1/ Pickup 1</p>
                <custom-datepicker
                    @dateSelected="setDate1($event)"
                    :date="selectedDate1"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :headerStyles="headerStyles"
                    :limits="limits1"
                />
                <button
                    v-if="pickups > 1"
                    type="button"
                    class="calender-button"
                    @click="selectedDate1 ? handleCalendar(1) : ''"
                >
                    Next
                </button>
                <button
                    v-else
                    type="button"
                    class="calender-button"
                    @click="selectedDate1 ? handleCalendarAndCloseModal(1) : ''"
                >
                    Done
                </button>
            </div>

            <div class="calendar-container" v-if="showweek1pickup2calendar">
                <p class="calendar-title">Week 1/ Pickup 2</p>
                <custom-datepicker
                    @dateSelected="setDate2($event)"
                    :date="selectedDate1"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits1_week"
                    :headerStyles="headerStyles"
                />
                <button
                    type="button"
                    class="calender-button"
                    @click="
                        selectedDate2 && selectedDate2 != selectedDate1
                            ? handleCalendarAndCloseModal(2)
                            : ''
                    "
                >
                    Done
                </button>
            </div>
            <!-- XX First Week XX -->

            <!-- Second Week -->

            <div class="calendar-container" v-if="showweek2pickup1calendar">
                <p class="calendar-title">Week 2/ Pickup 1</p>
                <custom-datepicker
                    @dateSelected="setDate3($event)"
                    :date="selectedDate1"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits2"
                    :headerStyles="headerStyles"
                />
                <button
                    v-if="pickups > 1"
                    type="button"
                    class="calender-button"
                    @click="selectedDate3 ? handleCalendar(3) : ''"
                >
                    Next
                </button>
                <button
                    v-else
                    type="button"
                    class="calender-button"
                    @click="selectedDate3 ? handleCalendarAndCloseModal(3) : ''"
                >
                    Done
                </button>
            </div>

            <div class="calendar-container" v-if="showweek2pickup2calendar">
                <p class="calendar-title">Week 2/ Pickup 2</p>
                <custom-datepicker
                    @dateSelected="setDate4($event)"
                    :date="selectedDate1"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits2"
                    :headerStyles="headerStyles"
                />
                <button
                    type="button"
                    class="calender-button"
                    @click="
                        selectedDate4 && selectedDate4 != selectedDate3
                            ? handleCalendarAndCloseModal(4)
                            : ''
                    "
                >
                    Done
                </button>
            </div>
            <!-- XX Second Week XX -->

            <!-- Third Week -->

            <div class="calendar-container" v-if="showweek3pickup1calendar">
                <p class="calendar-title">Week 3/ Pickup 1</p>
                <custom-datepicker
                    @dateSelected="setDate5($event)"
                    :date="selectedDate3"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits3"
                    :headerStyles="headerStyles"
                />
                <button
                    v-if="pickups > 1"
                    type="button"
                    class="calender-button"
                    @click="selectedDate5 ? handleCalendar(5) : ''"
                >
                    Next
                </button>
                <button
                    v-else
                    type="button"
                    class="calender-button"
                    @click="selectedDate5 ? handleCalendarAndCloseModal(5) : ''"
                >
                    Done
                </button>
            </div>

            <div class="calendar-container" v-if="showweek3pickup2calendar">
                <p class="calendar-title">Week 3/ Pickup 2</p>
                <custom-datepicker
                    @dateSelected="setDate6($event)"
                    :date="selectedDate3"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits3"
                    :headerStyles = "headerStyles"

                />
                <button
                    type="button"
                    class="calender-button"
                    @click="
                        selectedDate6 && selectedDate6 != selectedDate5
                            ? handleCalendarAndCloseModal(6)
                            : ''
                    "
                >
                    Done
                </button>
            </div>
            <!-- XX Third Week XX -->

            <!-- Fourth Week -->

            <div class="calendar-container" v-if="showweek4pickup1calendar">
                <p class="calendar-title">Week 4/ Pickup 1</p>
                <custom-datepicker
                    @dateSelected="setDate7($event)"
                    :date="selectedDate5"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits4"
                    :headerStyles="headerStyles"

                />

                <button
                    v-if="pickups > 1"
                    type="button"
                    class="calender-button"
                    @click="selectedDate7 ? handleCalendar(7) : ''"
                >
                    Next
                </button>
                <button
                    v-else
                    type="button"
                    class="calender-button"
                    @click="selectedDate7 ? handleCalendarAndCloseModal(7) : ''"
                >
                    Done
                </button>
            </div>

            <div class="calendar-container" v-if="showweek4pickup2calendar">
                <p class="calendar-title">Week 4/ Pickup 2</p>
                <custom-datepicker
                    @dateSelected="setDate8($event)"
                    :date="selectedDate5"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :limits="limits4"
                    :headerStyles="headerStyles"

                />
                <button
                    type="button"
                    class="calender-button"
                    @click="
                        selectedDate8 && selectedDate8 != selectedDate7
                            ? handleCalendarAndCloseModal(8)
                            : ''
                    "
                >
                    Done
                </button>
            </div>
            <!-- XX Fourth Week XX -->
        </div>
    </div>
</template>

<script>
import CustomDatepicker from "vue-custom-datepicker";
import moment from "moment";
export default {
    data() {
        return {
            isopen: false,
            showweek1pickup1calendar: false,
            showweek1pickup2calendar: false,
            showweek2pickup1calendar: false,
            showweek2pickup2calendar: false,
            showweek3pickup1calendar: false,
            showweek3pickup2calendar: false,
            showweek4pickup1calendar: false,
            showweek4pickup2calendar: false,
            showmodal: false,

            selectedweek: 0,
            selecteddatevalue: "",
            selectedDate1: '',
            selectedDate2: "",
            selectedDate3: "",
            selectedDate4: "",
            selectedDate5: "",
            selectedDate6: "",
            selectedDate7: "",
            selectedDate8: "",

            wrapperStyles: { width: "100%" },
            headerStyles: { width: '350px', margin: '0 auto', background: "#fff", color: "#000" , fontWeight: 'bolder', fontFamiley: 'Lato-Bold' },
            primaryColor: "#FDBD42",


            limits1: {
                start: moment().format("YYYY-MM-DD"),
                end: moment(this.selectedDate1)
                    .endOf("year")
                    .format("YYYY-MM-DD")
            },
            limits1_week: {
                start: moment(this.selecteddatevalue).format("YYYY-MM-DD"),
                end: moment(this.selecteddatevalue)
                    .add(6, "day")
                    .format("YYYY-MM-DD")
            },
            limits2: {
                start: moment(this.selecteddatevalue)
                    .add(7, "day")
                    .format("YYYY-MM-DD"),
                end: moment(this.selecteddatevalue)
                    .add(13, "day")
                    .format("YYYY-MM-DD")
            },
            limits3: {
                start: moment(this.selecteddatevalue)
                    .add(14, "day")
                    .format("YYYY-MM-DD"),
                end: moment(this.selecteddatevalue)
                    .add(20, "day")
                    .format("YYYY-MM-DD")
            },
            limits4: {
                start: moment(this.selecteddatevalue)
                    .add(26, "day")
                    .format("YYYY-MM-DD"),
                end: moment(this.selecteddatevalue)
                    .add(32, "day")
                    .format("YYYY-MM-DD")
            },

        };
    },
    components: {
        "custom-datepicker": CustomDatepicker
    },
    props: ["title", "name", "options", "openstate", "hasradio", "pickups"],
    methods: {
        changeIsOpenState() {
            if (this.openstate) {
                this.openstate = false;
                this.isopen = false;
            } else {
                this.isopen = !this.isopen;
            }
        },
        labelClicked(event) {
            // check the input
            event.target
                .closest(".option")
                .getElementsByClassName("radio")[0]
                .click();
        },
        openCalendar(weekNumber) {
            this.selectedweek = weekNumber;
            switch (weekNumber) {
                case 1:
                    this.showweek1pickup1calendar = true;
                    this.showweek2pickup1calendar = false;
                    this.showweek3pickup1calendar = false;
                    this.showweek4pickup1calendar = false;
                    break;
                case 2:
                    this.showweek2pickup1calendar = true;
                    this.showweek1pickup1calendar = false;
                    this.showweek3pickup1calendar = false;
                    this.showweek4pickup1calendar = false;
                    break;
                case 3:
                    this.showweek3pickup1calendar = true;
                    this.showweek1pickup1calendar = false;
                    this.showweek2pickup1calendar = false;
                    this.showweek4pickup1calendar = false;
                    break;
                case 4:
                    this.showweek4pickup1calendar = true;
                    this.showweek1pickup1calendar = false;
                    this.showweek2pickup1calendar = false;
                    this.showweek3pickup1calendar = false;
                    break;
            }
            // show calendars modal and stop body scrolling
            this.showmodal = true;
            // set focus to modal to enable escap
            setTimeout(function(){
                document.getElementById('calendarsModal').focus()
            }, 100)
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        },
        setDate1(date) {
            this.selectedDate1 = date;
            /* clear week 2,3,4 */
            this.selectedDate2= ""
            this.selectedDate3= ""
            this.selectedDate4= ""
            this.selectedDate5= ""
            this.selectedDate6= ""
            this.selectedDate7= ""
            this.selectedDate8= ""

            // Set all limits
            this.limits1_week.start = moment(date)
                .add(1, "day")
                .format("YYYY-MM-DD");
            this.limits1_week.end = moment(date)
                .add(6, "day")
                .format("YYYY-MM-DD");

            this.limits2.start = moment(date)
                .add(7, "day")
                .format("YYYY-MM-DD");
            this.limits2.end = moment(date)
                .add(13, "day")
                .format("YYYY-MM-DD");

            this.limits3.start = moment(date)
                .add(14, "day")
                .format("YYYY-MM-DD");
            this.limits3.end = moment(date)
                .add(20, "day")
                .format("YYYY-MM-DD");

            this.limits4.start = moment(date)
                .add(21, "day")
                .format("YYYY-MM-DD");
            this.limits4.end = moment(date)
                .add(27, "day")
                .format("YYYY-MM-DD");
        },
        setDate2(date) {
            this.selectedDate2 = date;

            this.selectedDate3= ""
            this.selectedDate4= ""
            this.selectedDate5= ""
            this.selectedDate6= ""
            this.selectedDate7= ""
            this.selectedDate8= ""
        },
        setDate3(date) {
            this.selectedDate3 = date;
            
            this.selectedDate4= ""
            this.selectedDate5= ""
            this.selectedDate6= ""
            this.selectedDate7= ""
            this.selectedDate8= ""
        },
        setDate4(date) {
            this.selectedDate4 = date;
            this.selectedDate5= ""
            this.selectedDate6= ""
            this.selectedDate7= ""
            this.selectedDate8= ""
        },
        setDate5(date) {
            this.selectedDate5 = date;
            this.selectedDate6= ""
            this.selectedDate7= ""
            this.selectedDate8= ""
        },
        setDate6(date) {
            this.selectedDate6 = date;
            this.selectedDate7= ""
            this.selectedDate8= ""
        },
        setDate7(date) {
            this.selectedDate7 = date;
            this.selectedDate8= ""

        },
        setDate8(date) {
            this.selectedDate8 = date;
        },
        hideAllCalendars() {
            this.showweek1pickup2calendar = false;
            this.showweek1pickup1calendar = false;
            this.showweek2pickup2calendar = false;
            this.showweek2pickup1calendar = false;
            this.showweek3pickup2calendar = false;
            this.showweek3pickup1calendar = false;
            this.showweek4pickup2calendar = false;
            this.showweek4pickup1calendar = false;
        },
        handleCalendar(number) {
            this.hideAllCalendars();
            if (this.pickups > 1) {
                switch (number) {
                    case 1:
                        // clendr 1 button is clicked
                        this.showweek1pickup2calendar = true;
                        break;

                    case 3:
                        this.showweek2pickup2calendar = true;
                        break;

                    case 5:
                        this.showweek3pickup2calendar = true;
                        break;

                    case 7:
                        this.showweek4pickup2calendar = true;
                        break;
                }
            }
        },
        handleCalendarAndCloseModal(number) {
            this.hideAllCalendars();
            if (this.pickups > 1) {
                switch (number) {
                    case 1:
                        // clendr 1 button is clicked
                        this.showweek1pickup2calendar = true;
                        break;

                    case 3:
                        this.showweek2pickup2calendar = true;
                        break;

                    case 5:
                        this.showweek3pickup2calendar = true;
                        break;

                    case 7:
                        this.showweek4pickup2calendar = true;
                        break;
                }
            }
            this.closeModal();
        },
        closeModal() {
            // hide modal and enable body scrolling
            this.showmodal = false;
            document.getElementsByTagName("body")[0].style.overflowX = "hidden";
        },
        test(){
            alert('Escap')
        },
        week1changed(){
            alert("Week 1 Changed")
        },
        week2changed(){
            alert("Week 2 Changed")
        },
        week3changed(){
            alert("Week 3 Changed")
        },
        week4changed(){
            alert("Week 4 Changed")
        },


    }
};
</script>

<style lang="scss">
$white: #ffffff;
$black: #000000;
$grey: #f1f3f7;
$blue: #22aee4;
$shadow: 0px 0px 10px #0000001a;
.AccordionCalendar {
    width: 100%;
    box-shadow: $shadow;
    border-radius: 10px 10px 0px 0px;
    .header {
        height: 60px;
        background: $grey;
        padding: 16px 24px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        .title {
            font-size: 18px;
        }
    }

    .options {
        width: 100%;
        height: fit-content;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        background: $white;
        padding: 24px 48px;

        .option {
            margin-bottom: 16px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 24px;
            .radio {
                width: 24px;
                height: 24px;
                color: $black;
            }
            .option-label {
                margin-left: 54px;
                font-size: 14px;
                color: $black;

                &.in-active{
                    color: #555;
                }
                .date {
                    margin-left: 20px;
                    font-size: 12px;
                    color: $blue;
                }
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
            height: 31px;
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
    .cd-body-wrapper header button  {
        background: #22aee4;
        border-radius: 20px;
    }
}
</style>
