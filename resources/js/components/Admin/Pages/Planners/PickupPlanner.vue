<template>
    <div class="PickupPlanner">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="calendar-container">
            <!-- <p class="calendar-title">Calendar Control</p> -->
            <vue-event-calendar
                :events="selecteddates"
                @month-changed="monthChanged()"
            >
            </vue-event-calendar>
        </div>

        <div class="date-container">
            <p class="selected-date">{{ selectedDate }}</p>
        </div>

        <table
            class="pickup-planner-table"
            id="PickupPlannerTable"
            v-if="loadedorders.length > 0"
        >
            <thead>
                <tr>
                    <th class="order-number-head">Client</th>
                    <th class="order-number-head">Order #</th>
                    <th class="order-number-head">Zone</th>
                    <th class="city-head" data-order="asc">
                        <div class="table-head-flex">
                            <p class="title">City</p>
                            <img
                                src="/images/admin/icons/reports.svg"
                                alt=""
                                class="table-head-icon"
                            />
                        </div>
                    </th>
                    <th class="order-number-head">Zip Code</th>

                    <th class="drop-off-address-head">Pickup Address</th>
                    <th class="package-name-head">Package Name</th>
                    <th class="number-of-bags-head">Bags</th>
                    <th class="number-of-bags-head">Dry Clean</th>
                    <th class="number-of-bags-head">AVS</th>
                    <th class="assigned-to-head">Driver</th>
                    <th class="number-of-bags-head">Print</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(order, index) in loadedorders" :key="order.id">
                    <td class="order-number-cell">
                        <p class="link" @click="goToShowUser(order.id)">
                            {{ order.client }}
                        </p>
                    </td>
                    <td class="order-number-cell">{{ order.id }}</td>
                    <td class="order-number-cell">{{ order.zone }}</td>
                    <td class="city-cell">{{ order.city }}</td>
                    <td class="city-cell">{{ order.zip_code }}</td>
                    <td class="drop-off-address-cell">
                        {{ order.drop_off_address }}
                    </td>
                    <td class="package-name-cell">{{ order.package_name }}</td>
                    <td class="number-of-bags-cell">{{ order.no_of_bags }}</td>
                    <td class="number-of-bags-cell">{{ order.dry_clean }}</td>
                    <td class="number-of-bags-cell">{{ order.avs }}</td>
                    <td
                        class="assigned-to-cell"
                        @click="showDriverModal(index)"
                    >
                        {{
                            order.assigned_to > 0
                                ? getDriverName(order.assigned_to)
                                : "Unassigned"
                        }}
                    </td>
                    <td class="number-of-bags-cell">
                        <input class="print" type="checkbox" />
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="table-hint" v-else>No Orders for That Day</p>

        <div class="flex-row" v-if="loadedorders.length > 0">
            <button class="footer-button">Print Pickup Sheet</button>
            <button class="footer-button">Print Pickup Orders</button>
        </div>

        <!--   <div
            class="modal"
            v-if="calendarModalState"
            @keydown.esc="closeCalendarModal"
            tabindex="0"
        >
            <div class="calendar-container">
                <custom-datepicker
                    @dateSelected="setDate($event)"
                    :date="selectedDate"
                    :primaryColor="primaryColor"
                    :wrapperStyles="wrapperStyles"
                    :headerStyles="headerStyles"
                />
            </div>
        </div> -->

        <div
            class="modal"
            v-if="driverModalState"
            @keydown.esc="closeDriverModal"
            tabindex="0"
        >
            <div class="modal-container" style="z-index: 500">
                <p class="title">Choose Deielvery</p>
                <div class="drivers-container">
                    <div
                        class="driver-item"
                        v-for="(driver, index) in drivers"
                        :key="driver.id"
                        @click="changeActiveRowDriver(index)"
                    >
                        <img :src="driver.image" alt="" class="driver-image" />
                        <p class="driver-name">{{ driver.name }}</p>
                    </div>
                </div>
                <span class="close" @click="closeDriverModal">X</span>
            </div>
        </div>
    </div>
</template>

<script>
import CustomDatepicker from "vue-custom-datepicker";
import moment from "moment";
export default {
    mounted() {
        this.monthChanged();
        $(".date-num").click(e => {
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
            let day = $(e.target)
                .text()
                .trim(); // need to be 2 digits
            var formattedDay = ("0" + Number(day)).slice(-2);

            let month = Number(currentMonthDate.split("/")[0]);
            var formattedMonth = ("0" + month).slice(-2);
            let year = Number(currentMonthDate.split("/")[1]);
            let selectedDate = `${year}-${formattedMonth}-${formattedDay}`;
            /* call ajax to get list of clients that order that day */
            /* Show Day Orders */
            this.showDayOrders = true;
            this.selectedDate = selectedDate;
            this.showMonthOrders();
        });
        setTimeout(() => {
            this.showMonthOrders();
        }, 200);
    },
    data() {
        return {
            selectedDate: moment().format("YYYY-MM-DD"),
            calendarModalState: false,
            driverModalState: false,
            activeRowIndex: -1,
            loadedorders: this.orders,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
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
    props: [
        "title",
        "date",
        "orders",
        "drivers",
        "showorderroute",
        "selecteddates",
        "totalsales"
    ],
    methods: {
        loadDatesFunction(){
            $(".date-num").click(e => {
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
            let day = $(e.target)
                .text()
                .trim(); // need to be 2 digits
            var formattedDay = ("0" + Number(day)).slice(-2);

            let month = Number(currentMonthDate.split("/")[0]);
            var formattedMonth = ("0" + month).slice(-2);
            let year = Number(currentMonthDate.split("/")[1]);
            let selectedDate = `${year}-${formattedMonth}-${formattedDay}`;
            /* call ajax to get list of clients that order that day */
            /* Show Day Orders */
            this.showDayOrders = true;
            this.selectedDate = selectedDate;
            this.showMonthOrders();
        });
        },
        showCalendarModal() {
            this.calendarModalState = true;
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        },
        closeCalendarModal() {
            this.calendarModalState = false;
            document.getElementsByTagName("body")[0].style.overflow = "auto";
        },

        showDriverModal(orderIndex) {
            this.activeRowIndex = orderIndex;
            this.driverModalState = true;
            window.scroll(0,0)
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        },
        closeDriverModal() {
            this.driverModalState = false;
            document.getElementsByTagName("body")[0].style.overflow = "auto";
        },
        changeActiveRowDriver(driverIndex) {
            this.orders[this.activeRowIndex].assigned_to = this.drivers[
                driverIndex
            ].id;
            // send ajax call to save driver .. order_id & driver_id
            this.closeDriverModal();
        },
        setDate(date) {
            this.selectedDate = date;
            // send ajax to get orders
            this.closeCalendarModal();
        },
        getDriverName(driverId) {
            let drivers = this.drivers;
            for (let i = 0; i < drivers.length; i++) {
                if (drivers[i].id == driverId) {
                    return drivers[i].name;
                    break;
                }
            }
        },

        monthChanged() {
            setTimeout(() => {
                this.getMonthSales(this.getCurrentMonthNumber());
            this.loadDatesFunction()

            }, 10);
            /* hide date orders */
            this.showDayOrders = false;
        },

        getCurrentYear() {
            /* get current month title text */
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
            let currentYear = Number(currentMonthDate.split("/")[1]);
            return currentYear;
        },
        getCurrentMonthNumber() {
            /* get current month title text */
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
            let currentMonth = Number(currentMonthDate.split("/")[0]);
            return currentMonth;
        },
        getMonthSales(monthNumber) {
            switch (monthNumber) {
                case 1:
                    this.selectedMonth = "January";
                    break;
                case 2:
                    this.selectedMonth = "February";

                    break;
                case 3:
                    this.selectedMonth = "March";

                    break;
                case 4:
                    this.selectedMonth = "April";

                    break;
                case 5:
                    this.selectedMonth = "May";

                    break;
                case 6:
                    this.selectedMonth = "June";

                    break;
                case 7:
                    this.selectedMonth = "July";

                    break;
                case 8:
                    this.selectedMonth = "August";

                    break;
                case 9:
                    this.selectedMonth = "September";

                    break;
                case 10:
                    this.selectedMonth = "October";

                    break;
                case 11:
                    this.selectedMonth = "November";

                    break;
                case 12:
                    this.selectedMonth = "December";

                    break;
            }
            /* check if month has any sales */
            let monthSales = this.totalsales.find(x => x.month == monthNumber);
            if (monthSales != undefined) {
                this.selectedMonthSales = monthSales.total_sales;
            } else {
                this.selectedMonthSales = 0;
            }
        },
        showMonthOrders() {
            let allOrders = this.orders;
            let selectedDateOrders = [];
            for (let index = 0; index < allOrders.length; index++) {
                if (allOrders[index].order_date == this.selectedDate) {
                    selectedDateOrders.push(allOrders[index]);
                }
            }
            this.loadedorders = selectedDateOrders;
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$orange: #ffa800;
$white: #fff;

$color1: #ffff66;
$color2: #ffcc00;
$color3: #ff9933;
$color4: #ff3300;
$color5: #ff0000;

.PickupPlanner {
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

    .calendar-container {
        width: 600px;
        height: 450px;
        box-shadow: 0px 0px 10px #00000033;
        border-radius: 30px;
        padding: 24px;
        margin: 20px auto;
        .calendar-title {
            color: $blue;
            font-family: "Open-Sans-Bold";
            font-size: 16px;
            margin-left: 25px;
        }
        .cal-wrapper {
            padding: 0 !important;
            margin: 10px auto;
            width: 100%;

            .cal-header {
                font-family: "Open-Sans-Bold";
            }
        }

        /* order heavy colors */

        .color1 {
            .date-num {
                color: #000 !important;
            }
            .is-event {
                background: $color1 !important;
                border: none !important;
            }
        }
        .color2 {
            .date-num {
                color: #000 !important;
            }
            .is-event {
                background: $color2 !important;
                border: none !important;
            }
        }
        .color3 {
            .date-num {
                color: #000 !important;
            }
            .is-event {
                background: $color3 !important;
                border: none !important;
            }
        }
        .color4 {
            .date-num {
                color: #000 !important;
            }
            .is-event {
                background: $color4 !important;
                border: none !important;
            }
        }
        .color5 {
            .date-num {
                color: #fff !important;
            }
            .is-event {
                background: $color5 !important;
                border: none !important;
            }
        }

        .events-wrapper {
            display: none !important;
        }
    }

    .sort-by-container {
        margin-top: 10px;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            font-size: 14px;
            font-family: "Open-Sans-Regular";
            color: $text-grey;
        }
        .sorting-list {
            color: $blue;
            font-size: 14px;
            font-family: "Open-Sans-Semibold";
            width: 50px;
            background: #fff;
        }
    }

    .date-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: fit-content;
        margin: 10px auto;
        cursor: pointer;
        .selected-date {
            font-family: "Open-Sans-Bold";
            margin-right: 10px;
            color: $orange;
        }
    }

    .pickup-planner-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 50px;
        th,
        td {
            margin: 0;
            border-bottom: 1px solid $light-grey;
            text-align: left;
            padding: 12px 0;
        }
        th {
            color: $text-grey;
            font-size: 16px;
            font-family: "Open-Sans-Regular";
            font-weight: lighter;
        }
        td {
            font-size: 14px;
        }

        .table-head-flex {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;

            .table-head-icon {
                margin-left: 10px;
            }
        }
        .order-number-head {
            width: 90px;
        }
        .order-number-cell {
            color: $blue;
            font-family: "Open-Sans-Semibold";
            .link {
                cursor: pointer;
            }
        }
        .city-head {
            width: 80px;
        }
        .drop-off-address-head {
            width: 150px;
        }
        .number-of-bags-head {
            width: 80px;
        }
        .package-name-head {
            width: 140px;
        }
        .assigned-to-head {
            width: 140px;
        }

        .assigned-to-cell {
            cursor: pointer;
        }
    }

    .modal {
        width: 100%;
        height: 100%;
        background: rgba($color: #000000, $alpha: 0.6);
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        .modal-container {
            padding: 30px 180px;

            width: 904px;
            height: 600px;
            background: #e8ecf3;
            border: 1px solid #f9f9f9;
            border-radius: 20px;
            position: relative;
            .title {
                font-family: "Open-Sans-Bold";
                font-size: 16px;
                color: $blue;
                width: 100%;
                text-align: center;
            }
            .drivers-container {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                margin: 50px auto;
                column-gap: 80px;
                .driver-item {
                    display: flex;
                    flex-direction: row;
                    justify-content: flex-start;
                    align-items: center;
                    .driver-image {
                        width: 76px;
                        height: 76px;
                        border-radius: 38px;
                        margin-right: 20px;
                    }
                    .driver-name {
                        font-family: "Open-Sans-Regular";
                        font-size: 14px;
                    }
                }
            }
        }
        .close {
            position: absolute;
            top: 30px;
            right: 30px;
            cursor: pointer;
        }
    }

    .flex-row {
        display: flex;
        justify-content: space-evenly;
        flex-direction: row;
        margin-bottom: 30px;
        .footer-button {
            width: 220px;
            padding: 6px 20px;
            margin-top: 30px;
            font-size: 16px;
            color: #000;
            background-color: #fff;
            border: 1px solid rgb(212, 80, 80);
            border-radius: 10px;
        }
    }
    .table-hint {
        text-align: center;
        color: #666;
        margin: 10px auto;
        margin-bottom: 10px;
        font-size: 20px;
    }
}
</style>
