<template>
    <div class="Dashboard">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <div class="items-container">
            <Dashboard-Item
                :showvalue="true"
                class="DashboardItem"
                :value="totalclients"
                title="Total Clients"
                color="#FFA800"
                :gotoroute="totalclientsroute"
            />

            <Dashboard-Item
                class="DashboardItem"
                :value="newclients"
                :showvalue="true"
                title="New Clients"
                color="#22AEE4"
                :gotoroute="newclientsroute"
            />
            <Dashboard-Item
                :showvalue="false"
                class="DashboardItem"
                :value="salespermonth"
                title="Sales per Month"
                color="#22AEE4"
                :gotoroute="salespermonthroute"
            />

            <Dashboard-Item
                class="DashboardItem"
                :showvalue="false"
                :value="salesperpackage"
                title="Sales per Package"
                color="#22AEE4"
                :gotoroute="salesperpackageroute"
            />
            <Dashboard-Item
                class="DashboardItem"
                :showvalue="false"
                :value="salespercity"
                title="Sales per City"
                color="#22AEE4"
                :gotoroute="userspercityroute"
            />

            <Dashboard-Item
                class="DashboardItem"
                :showvalue="true"
                :value="cancellationrequests"
                title="Cancellation Requests"
                color="#0000004D"
                :gotoroute="cancellationrequestsroute"
            />
        </div>

        <div class="flex-row">
            <div class="calendar-container" style="margin-bottom: 30px;">
                <!-- <p class="calendar-title">Calendar Control</p> -->
                <vue-event-calendar
                    :events="selectedDates"
                    @month-changed="monthChanged()"
                ></vue-event-calendar>
            </div>
            <div class="d-flex flex-column">
                <NumberOfOrdersCard
                    class="number-of-orders-card"
                    :value="loadedOrdersNumber"
                    @open-orders-number-modal="showOrderModal"
                />

                <PickupsRange
                    class="number-of-orders-card mt-4"
                    :value="loadedRangeNumber"
                    @open-pickups-range-modal="showRangeModal"
                    @first-date-changed="firstEffectiveDateSelected"
                    @second-date-changed="secondEffectiveDateSelected"
                />
            </div>
        </div>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">No. of Pickups</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(range, index) in selectedranges" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ range.start_date }}</td>
                    <td>{{ range.end_date }}</td>
                    <td>{{ range.pickups }}</td>
                </tr>
            </tbody>
        </table>

        <EditNumberOfOrdersCard
            v-show="ordermodalstate"
            @hide-modal="hideOrderModal"
            @value-selected="updateOrderValue"
            :value="loadedOrdersNumber"
        />

        <EditPickupsRange
            v-show="rangemodalstate"
            @hide-modal="hideRangeModal"
            @value-selected="updateRangeValue"
            :value="loadedRangeNumber"
        />
    </div>
</template>

<script>
import DashboardItem from "./Components/DashboardItem";
import NumberOfOrdersCard from "./Components/NumberOfOrdersCard";
import EditNumberOfOrdersCard from "./Components/EditNumberOfOrdersCard";
import PickupsRange from "./Components/PickupsRange";
import EditPickupsRange from "./Components/EditPickupsRange";
export default {
    props: [
        "title",
        "date",
        "totalclients",
        "newclients",
        "salespermonth",
        "salesperpackage",
        "salespercity",
        "cancellationrequests",
        "totalclientsroute",
        "newclientsroute",
        "salespermonthroute",
        "salesperpackageroute",
        "userspercityroute",
        "cancellationrequestsroute",
        "ordersnumber",
        "pickupsrange",
        "pickups",
        "selectedranges"
    ],
    components: {
        DashboardItem,
        NumberOfOrdersCard,
        EditNumberOfOrdersCard,
        PickupsRange,
        EditPickupsRange
    },

    mounted() {
        setTimeout(() => {
            $(".date-num").mouseenter(e => {
                let currentMonthDate = $(
                    ".cal-wrapper .cal-header .title"
                ).text();
                let day = $(e.target)
                    .text()
                    .trim(); // need to be 2 digits
                let formattedDay = ("0" + Number(day)).slice(-2);

                let month = Number(currentMonthDate.split("/")[0]);
                let formattedMonth = ("0" + month).slice(-2);
                let year = Number(currentMonthDate.split("/")[1]);
                let selectedDateFormated = `${year}-${formattedMonth}-${formattedDay}`;
                let selectedDate = `${year +
                    "/" +
                    formattedMonth +
                    "/" +
                    formattedDay}`;

                /* get pickups of that day */
                let allPickups = this.loadedPickups || [];
                let selectedDay = allPickups.find(x => x.date == selectedDate);
                let datePickups = 0;
                if (selectedDay != undefined) {
                    datePickups = selectedDay.pickups;
                }

                this.selectedranges.forEach(item => {
                    /* Get the pickups from the range */
                    var dateFrom = item.start_date;
                    // console.log("item: ", item);
                    // console.log("dateFrom: ", dateFrom);
                    var dateTo = item.end_date;
                    // console.log("dateTo: ", dateTo);
                    var dateCheck = selectedDate;

                    // console.log("dateCheck: ", dateCheck);
                    var d1 = dateFrom.split("/");
                    var d2 = dateTo.split("/");
                    var c = dateCheck.split("/");

                    var from = new Date(d1[2], parseInt(d1[1]) - 2, d1[0]); // -1 because months are from 0 to 11
                    var to = new Date(d2[2], parseInt(d2[1]) + 1, d2[0]);
                    var check = new Date(c[2], parseInt(c[1]), c[0]);

                    if (check > from && check < to) {
                        datePickups = item.pickups;
                    }
                    // console.log(check > from && check < to);
                });

                $(e.target).attr("title", datePickups + " Pickups");
            });

            /* Push selected ranges */
            let oldStartDates = [];
            let oldEndDates = [];

            this.selectedranges.forEach(item => {
                oldStartDates.push({
                    date: item.start_date,
                    title: "Effective Date",
                    customClass: "effective-date highlight"
                });
                oldEndDates.push({
                    date: item.end_date,
                    title: "Effective Date",
                    customClass: "effective-date highlight"
                });
            });

            this.firstSelecedDate = oldStartDates;
            this.secondSelecedDate = oldEndDates;
            this.updateSelectedDates();

            // this.loadedPickups = allPickups;

            // // console.log("allPickups: ", allPickups);
        }, 1000);
    },
    data() {
        return {
            loadedOrdersNumber: this.ordersnumber,
            loadedRangeNumber: this.pickupsrange,
            ordermodalstate: false,
            rangemodalstate: false,
            selectedDates: [],
            firstSelecedDate: [],
            secondSelecedDate: [],
            loadedPickups: this.pickups
        };
    },
    methods: {
        monthChanged() {
            setTimeout(() => {
                this.loadDatesFuntion();
            }, 200);
        },
        loadDatesFuntion() {
            $(".date-num").mouseenter(e => {
                let currentMonthDate = $(
                    ".cal-wrapper .cal-header .title"
                ).text();
                let day = $(e.target)
                    .text()
                    .trim(); // need to be 2 digits
                let formattedDay = ("0" + Number(day)).slice(-2);

                let month = Number(currentMonthDate.split("/")[0]);
                let formattedMonth = ("0" + month).slice(-2);
                let year = Number(currentMonthDate.split("/")[1]);
                let selectedDateFormated = `${year}-${formattedMonth}-${formattedDay}`;
                let selectedDate = `${year + "/" + month + "/" + day}`;

                /* get pickups of that day */
                let allPickups = this.loadedPickups || [];
                let selectedDay = allPickups.find(x => x.date == selectedDate);
                let datePickups = 0;
                if (selectedDay != undefined) {
                    datePickups = selectedDay.pickups;
                }

                $(e.target).attr("title", datePickups + " Pickups");
            });
        },
        showOrderModal() {
            this.ordermodalstate = true;
        },
        hideOrderModal() {
            this.ordermodalstate = false;
        },
        updateOrderValue(value) {
            this.loadedOrdersNumber = value;
        },
        showRangeModal() {
            this.rangemodalstate = true;
        },
        hideRangeModal() {
            this.rangemodalstate = false;
        },
        updateRangeValue(value) {
            this.loadedRangeNumber = value;
        },
        firstEffectiveDateSelected(dateValue) {
            let year = dateValue.substr(0, 4);
            let month = dateValue.substr(5, 2);
            let day = dateValue.substr(8, 2);
            let formatedDate = `${year + "/" + month + "/" + day}`;
            // this.firstSelecedDate = [];
            this.firstSelecedDate.push({
                date: formatedDate,
                title: "Effective Date",
                customClass: "effective-date highlight"
            });
            this.updateSelectedDates();
        },
        secondEffectiveDateSelected(dateValue) {
            let year = dateValue.substr(0, 4);
            let month = dateValue.substr(5, 2);
            let day = dateValue.substr(8, 2);
            let formatedDate = `${year + "/" + month + "/" + day}`;
            // this.secondSelecedDate = [];
            this.secondSelecedDate.push({
                date: formatedDate,
                title: "Effective Date",
                customClass: "effective-date highlight"
            });

            this.updateSelectedDates();
        },
        updateSelectedDates() {
            this.selectedDates = [
                ...this.firstSelecedDate,
                ...this.secondSelecedDate
            ];

            if (this.secondSelecedDate) {
                for (let i = 0; i < this.firstSelecedDate.length; i++) {
                    let firstSelectedDate = this.firstSelecedDate[i].date; //2021/03/04
                    let firstYear = firstSelectedDate.split("/")[0];
                    let firstMonthAndDay = firstSelectedDate
                        .replace(firstYear, "")
                        .replace("/", "");
                    let firstMonth = firstMonthAndDay.split("/")[0];
                    let firstDay = firstMonthAndDay.split("/")[1];

                    let secondSelectedDate = this.secondSelecedDate[i].date; //2021/03/04
                    let secondYear = secondSelectedDate.split("/")[0];
                    let secondMonthAndDay = secondSelectedDate
                        .replace(secondYear, "")
                        .replace("/", "");
                    let secondMonth = secondMonthAndDay.split("/")[0];
                    let secondDay = secondMonthAndDay.split("/")[1];

                    let dates = this.getDates(
                        new Date(firstYear, firstMonth, firstDay),
                        new Date(secondYear, secondMonth, secondDay)
                    );

                    let dateRange = [];
                    dates.forEach(function(date) {
                        // // console.log(date);
                        let Year = date.split("-")[0];
                        let MonthAndDay = date
                            .replace(Year, "")
                            .replace("-", "");
                        let Month = MonthAndDay.split("-")[0];
                        let Day = MonthAndDay.split("-")[1];

                        let formatedDate = `${Year + "/" + Month + "/" + Day}`;
                        dateRange.push(formatedDate);
                    });

                    dateRange.forEach(item => {
                        this.selectedDates.push({
                            date: item,
                            title: "Effective Date",
                            customClass: "effective-date highlight"
                        });
                    });
                }

                // // console.log("this.selectedDates: ", this.selectedDates);
            }
        },

        getDates(startDate, endDate) {
            let dates = [],
                currentDate = startDate,
                addDays = function(days) {
                    let date = new Date(this.valueOf());
                    date.setDate(date.getDate() + days);
                    return date;
                };
            while (currentDate <= endDate) {
                let formattedDay = ("0" + Number(currentDate.getDate())).slice(
                    -2
                );

                let month = Number(currentDate.getMonth());
                let formattedMonth = ("0" + month).slice(-2);
                let year = currentDate.getFullYear();
                let selectedDateFormated = `${year}-${formattedMonth}-${formattedDay}`;

                dates.push(selectedDateFormated);
                currentDate = addDays.call(currentDate, 1);
            }
            return dates;
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;

.Dashboard {
    width: 100%;
    min-height: 100%;
    overflow: hidden;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0 26px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .items-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        padding: 0 20px;
        .DashboardItem {
            margin: 2px 8px;
        }
    }

    .flex-row {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
        margin: 30px auto 20px 24px;
        flex-wrap: wrap;
    }
    /* Handle Calendar */
    .calendar-container {
        width: 550px;
        height: 440px;
        box-shadow: 0px 0px 10px #00000033;
        border-radius: 30px;
        padding: 24px;
        margin-top: 30px;
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
        .blue {
            .date-num {
                color: #fff !important;
            }
            .is-event {
                background: blue !important;
                border: none !important;
            }
        }

        .orange {
            .date-num {
                color: #fff !important;
            }
            .is-event {
                background: orange !important;
                border: none !important;
            }
        }
        .effective-date {
            .date-num {
                color: #fff !important;
            }
            .is-event {
                background: #aaa !important;
                border: none !important;
            }
        }
        .events-wrapper {
            display: none !important;
        }
    }

    /* Number Of Orders */
    .number-of-orders-card {
        margin-left: 40px;
    }
    /* XX Number Of Orders XX */

    /* XX Handle Calendar XX */
}
</style>
