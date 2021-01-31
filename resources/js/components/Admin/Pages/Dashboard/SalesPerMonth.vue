<template>
    <div class="SalesPerMonth">
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

        <p class="sales-count">Total Sales in {{ selectedMonth }} {{selectedMonthSales}}</p>


<div class="date-users-table" v-if="showDayOrders">
    <div style="display: flex;justify-content: space-between; width: 58%">
        <p class="date-title">{{selectedDate}}<span class="date-sales-count">Total: {{selectedDateOrders}}</span></p>
    </div>

        <table class="new-clients-table" id="newClientsTable">
        <thead>
        <tr>
            <th class="username-head"  data-order="asc"><div class="table-head-flex"><p class="title">Username</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="city-head"><div class="table-head-flex"><p class="title">City</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="date-head"><div class="table-head-flex"><p class="title">Phone</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">Package Name</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">Service Status</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
            <th class="package-head"><div class="table-head-flex"><p class="title">Completion Date</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="client in clients" :key="client.id">
            <td class="username-cell"><p class="link" @click="goToShowUser(client.id)">{{client.name}}</p></td>
            <td class="city-cell">{{client.city}}</td>
            <td class="date-cell">{{client.phone}}</td>
            <td class="package-cell">{{client.package_name}}</td>
            <td class="package-cell">{{client.service_status}}</td>
            <td class="package-cell">{{client.completion_date}}</td>
        </tr>
        </tbody>
    </table>
</div>

    </div>
</template>

<script>
export default {
    mounted(){
        this.monthChanged();
        $('.date-num').click((e)=>{
            let currentMonthDate = $(".cal-wrapper .cal-header .title").text()
            let day = $(e.target)
                .text()
                .trim(); // need to be 2 digits
            var formattedDay = ("0" + Number(day)).slice(-2);

            
            let month = Number(currentMonthDate.split("/")[0]);
            var formattedMonth = ("0" + month).slice(-2);
            
            let year = Number(currentMonthDate.split("/")[1])
            /* call ajax to get list of clients that order that day */
            let monthNumberString = currentMonthDate.split("/")[0]
            // need to get the js date format to get the day name
            //console.log(new Date(`${year}-${day}-${monthNumberString}`)); 
            /* Show Day Orders */
            this.showDayOrders = true
            this.selectedDate = `${this.selectedMonth} ${day}, ${year}`


            let selectedDateFormated = `${year}/${formattedMonth}/${formattedDay}`;
            /* get the orders per that date .. 2020/12/1 */
            let selectedOrders = this.ordersDates.find(x=>x.date == selectedDateFormated)
            if (selectedOrders != undefined) {
                this.selectedDateOrders = selectedOrders.orders
            } else {
                this.selectedDateOrders = 0
            }
})
    },
    data() {
        return {
            modalstate: false,
            selectedMonth: "",
            selectedMonthSales: '',
            selectedDate: '',
            showDayOrders: false,
            ordersDates : this.selecteddates,
            selectedDateOrders: 0,
            selecedDateFormated: '',
            clients: [
                {id: 1, name: 'Mohamed Salah', city: 'Alexandria' ,phone: '01286727987' , package_name : 'Package 1', service_status: 'In Progress', completion_date: '-' }
            ]
        };
    },
    props: ["title", "date", "selecteddates", "totalsales"],
    methods: {
        monthChanged() {
            setTimeout(() => {
                this.getMonthSales(this.getCurrentMonthNumber());
            }, 10);
            /* hide date orders */
            this.showDayOrders = false
  
        },
        getCurrentYear(){
                /* get current month title text */
                let currentMonthDate = $(".cal-wrapper .cal-header .title").text();
                let currentYear = Number(currentMonthDate.split("/")[1]);
                return currentYear;
        },
        getCurrentMonthNumber(){
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
            let monthSales = this.totalsales.find(x => x.month == monthNumber)
            if (monthSales != undefined){
                this.selectedMonthSales = monthSales.total_sales
            } else {
                this.selectedMonthSales = 0
            }
        }


    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;

$color1: #ffff66;
$color2: #ffcc00;
$color3: #ff9933;
$color4: #ff3300;
$color5: #ff0000;

.SalesPerMonth {
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
        width: 800px;
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
    .sales-count {
        text-align: center;
        font-size: 21px;
        font-family: "Open-Sans-SemiBold";
    }
.date-users-table{
    
.date-title {
    margin-top: 20px;
        text-align: left;
        font-size: 21px;
        font-family: "Open-Sans-SemiBold";
        .date-sales-count{
            margin-left: 100px;
        }
    }

    .new-clients-table{
        width: 100%;
        border-collapse: collapse;
        margin: 30px auto;
        th,td {
            margin: 0 ;
            border-bottom: 1px solid $light-grey;
            text-align: left;
            padding: 12px 0;
        }
        th{
            color: $text-grey;
            font-size: 16px;
            font-family: 'Open-Sans-Regular';
            font-weight: lighter;
        }
        td{
            font-size: 14px;
        }

        .table-head-flex{
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;

            .table-head-icon{
                margin-left: 10px;
                margin-top: 15px;
            }
        }
        .username-head{
            width: 150px;
            position: relative;
            
        }
        .username-cell{
            color: $blue;
            font-family: 'Open-Sans-Semibold';
            .link{
                cursor: pointer;
            }
        }
        .city-head{
            width: 120px;
        }
        .date-head{
            width: 150px;
        }
        .package-head{
            width: 100px;
        }
        .orders-head{
            width: 100px;
        }
        
    }
}

}
</style>
