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
            <NumberOfOrdersCard
                class="number-of-orders-card"
                :value="loadedOrdersNumber"
                @open-orders-number-modal="showOrderModal"
            />

            <PickupsRange
                class="number-of-orders-card"
                :value="loadedRangeNumber"
                @open-pickups-range-modal="showRangeModal"
                @first-date-changed="firstEffectiveDateSelected"
                @second-date-changed="secondEffectiveDateSelected"
            />
        </div>

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
        "pickups"
    ],
    components: {
        DashboardItem,
        NumberOfOrdersCard,
        EditNumberOfOrdersCard,
        PickupsRange,
        EditPickupsRange
    },
    
     mounted() {
          $(".date-num").mouseenter(e => {
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
            let day = $(e.target)
                .text()
                .trim(); // need to be 2 digits
            var formattedDay = ("0" + Number(day)).slice(-2);

            let month = Number(currentMonthDate.split("/")[0]);
            var formattedMonth = ("0" + month).slice(-2);
            let year = Number(currentMonthDate.split("/")[1]);
            let selectedDateFormated = `${year}-${formattedMonth}-${formattedDay}`;
            let selectedDate = `${year+"/"+month+"/"+day}`
            
            
            
            /* get pickups of that day */
            let allPickups = this.pickups
            
            let selectedDay = allPickups.find(x=>x.date == selectedDate)
            let datePickups=0;
            if (selectedDay != undefined){
                datePickups = selectedDay.pickups
            }
            $(e.target).attr("title", datePickups + " Pickups")
        });
    },
    data() {
        return {
            loadedOrdersNumber: this.ordersnumber,
            loadedRangeNumber: this.pickupsrange,
            ordermodalstate: false,
            rangemodalstate: false,
            selectedDates: [],
            firstSelecedDate: "",
            secondSelecedDate: ""
        };
    },
    methods: {
        monthChanged(){
            setTimeout(() => {
                this.loadDatesFuntion()
            }, 200);
        },
        loadDatesFuntion(){
            $(".date-num").mouseenter(e => {
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
            let day = $(e.target)
                .text()
                .trim(); // need to be 2 digits
            var formattedDay = ("0" + Number(day)).slice(-2);

            let month = Number(currentMonthDate.split("/")[0]);
            var formattedMonth = ("0" + month).slice(-2);
            let year = Number(currentMonthDate.split("/")[1]);
            let selectedDateFormated = `${year}-${formattedMonth}-${formattedDay}`;
            let selectedDate = `${year+"/"+month+"/"+day}`
            
            
            
            /* get pickups of that day */
            let allPickups = this.pickups
            
            let selectedDay = allPickups.find(x=>x.date == selectedDate)
            let datePickups=0;
            if (selectedDay != undefined){
                datePickups = selectedDay.pickups
            }
            $(e.target).attr("title", datePickups + " Pickups")
        });
        },
        showOrderModal() {
            this.ordermodalstate = true;
        },
        hideOrderModal() {
            this.ordermodalstate = false;
        },
        updateOrderValue(value) {
            this.loadedOrdersNumber = value
        },
        showRangeModal() {
            this.rangemodalstate = true;
        },
        hideRangeModal() {
            this.rangemodalstate = false;
        },
        updateRangeValue(value) {
                        this.loadedRangeNumber = value

        },
        firstEffectiveDateSelected(dateValue) {
            let year = dateValue.substr(0, 4);
            let month = dateValue.substr(5, 2);
            let day = dateValue.substr(8, 2);
            let formatedDate = `${year + "/" + month + "/" + day}`;
            this.firstSelecedDate = [];
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
            this.secondSelecedDate = [];
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
