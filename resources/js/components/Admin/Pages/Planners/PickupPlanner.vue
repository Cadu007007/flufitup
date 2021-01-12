<template>
  <div class="PickupPlanner">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
<div class="sort-by-container">
    <p class="title">Sort by:</p>
    <select class="sorting-list" name="sorting_by">
        <option value="all">All</option>
    </select>
</div>

<div class="date-container" @click="showCalendarModal()">
    <p class="selected-date">{{selectedDate}}</p>
    <img src="/images/admin/icons/pickup-planner-icon-active.svg" alt="">
</div>

    <table class="pickup-planner-table" id="PickupPlannerTable">
        <thead>
        <tr>
            <th class="order-number-head">Client</th>
            <th class="order-number-head">Order #</th>
            <th class="order-number-head">Zone</th>
            <th class="city-head"  data-order="asc"><div class="table-head-flex"><p class="title">City</p><img src="/images/admin/icons/reports.svg" alt="" class="table-head-icon"></div></th>
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
        
        <tr v-for="(order,index) in orders" :key="order.id">
            <td class="order-number-cell"><p class="link" @click="goToShowUser(order.id)">{{order.client}}</p></td>
            <td class="order-number-cell">{{order.id}}</td>
            <td class="order-number-cell">{{order.zone}}</td>
            <td class="city-cell">{{order.city}}</td>
            <td class="city-cell">{{order.zip_code}}</td>
            <td class="drop-off-address-cell">{{order.drop_off_address}}</td>
            <td class="package-name-cell">{{order.package_name}}</td>
            <td class="number-of-bags-cell">{{order.no_of_bags}}</td>
            <td class="number-of-bags-cell">{{order.dry_clean}}</td>
            <td class="number-of-bags-cell">{{order.avs}}</td>
            <td class="assigned-to-cell" @click="showDriverModal(index)">{{ order.assigned_to > 0 ? getDriverName(order.assigned_to) : 'Unassigned'}}</td>
            <td class="number-of-bags-cell"><input class="print" type="checkbox"></td>
        </tr>
        </tbody>
    </table>

    <div class="flex-row">
        <button class="footer-button">Print Pickup Sheet</button>
        <button class="footer-button">Print Pickup Orders</button>
    </div>
    
<div class="modal" v-if="calendarModalState" @keydown.esc="closeCalendarModal"  tabindex="0">
    <div class="calendar-container">
    <custom-datepicker
        @dateSelected="setDate($event)"
        :date="selectedDate"
        :primaryColor="primaryColor"
        :wrapperStyles="wrapperStyles"
        :headerStyles="headerStyles"
    />
    </div>
</div>
    
<div class="modal" v-if="driverModalState" @keydown.esc="closeDriverModal"  tabindex="0">
    <div class="modal-container">
        <p class="title">Choose Deielvery</p>
        <div class="drivers-container">
            <div class="driver-item" v-for="(driver,index) in drivers" :key="driver.id" @click="changeActiveRowDriver(index)">
                <img :src="driver.image" alt="" class="driver-image">
                <p class="driver-name">{{ driver.name }} </p>
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
    data() {
        return {
        selectedDate: moment().format('YYYY-MM-DD'),
        calendarModalState: false,
        driverModalState: false,
        activeRowIndex: -1,
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        wrapperStyles: { width: "100%" },
        headerStyles: { width: '350px', margin: '0 auto', background: "#fff", color: "#000" , fontWeight: 'bolder', fontFamiley: 'Lato-Bold' },
        primaryColor: "#FDBD42",
        }
    },
    components:{
        "custom-datepicker": CustomDatepicker
    },
    props: ['title','date','orders', 'drivers','showorderroute'],
    methods: {
        showCalendarModal(){
            this.calendarModalState = true;
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        },
        closeCalendarModal() {
            this.calendarModalState= false
            document.getElementsByTagName("body")[0].style.overflow = "auto";
        },
        
        showDriverModal(orderIndex){
            this.activeRowIndex = orderIndex;
            this.driverModalState = true;
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
        },
        closeDriverModal() {
            this.driverModalState= false
            document.getElementsByTagName("body")[0].style.overflow = "auto";
        },
        changeActiveRowDriver(driverIndex){
            this.orders[this.activeRowIndex].assigned_to = this.drivers[driverIndex].id;
            // send ajax call to save driver .. order_id & driver_id
            this.closeDriverModal();
        },
        setDate(date){
            this.selectedDate = date;
            // send ajax to get orders
            this.closeCalendarModal()
        },
        getDriverName(driverId){
            let drivers =this.drivers;
            for (let i=0; i < drivers.length; i++){
                if (drivers[i].id == driverId ){
                    return drivers[i].name;
                    break;
                }
            }
            
        }
    },

}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;
$orange: #FFA800;
$white: #fff;

.PickupPlanner{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        .title{
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }

    }

    .sort-by-container{
        margin-top: 10px;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title{
            font-size: 14px;
            font-family: 'Open-Sans-Regular';
            color: $text-grey;
        }
        .sorting-list{
            color: $blue;
            font-size: 14px;
            font-family: 'Open-Sans-Semibold';
            width: 50px;
            background: #fff;   
        }
    }

    .date-container{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: fit-content;
        margin: 10px auto;
        cursor: pointer;
        .selected-date{
            font-family: 'Open-Sans-Bold';
            margin-right: 10px;
            color: $orange;
        }
    }

    .pickup-planner-table{
        width: 100%;
        border-collapse: collapse;
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
            }
        }
        .order-number-head{
            width: 90px;
        }
        .order-number-cell{
            color: $blue;
            font-family: 'Open-Sans-Semibold';
            .link{
                cursor: pointer;
            }
        }
        .city-head{
            width: 80px;
        }
        .drop-off-address-head{
            width: 150px;
        }
        .number-of-bags-head{
            width: 80px;
        }
        .package-name-head{
            width: 140px;
        }
        .assigned-to-head{
            width: 140px;
        }

        .assigned-to-cell{
            cursor: pointer;
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
        .modal{
            width: 100%;
            height: 100%;
            background: rgba($color: #000000, $alpha: 0.6);
            position: absolute;
            top: 0;
            left: 0;    
            display: flex;
            justify-content: center;
            align-items: center;
            .modal-container{
                padding: 30px 180px;

                width: 904px;
                height: 600px;
                background: #E8ECF3;
                border: 1px solid #F9F9F9;
                border-radius: 20px;
                position: relative;
                .title{
                    font-family: 'Open-Sans-Bold';
                    font-size: 16px;
                    color: $blue;
                    width: 100%;
                    text-align: center;
                }
                .drivers-container{
                    display: grid;
                    grid-template-columns: repeat(3,1fr);
                    margin: 50px auto;
                    column-gap: 80px;;
                    .driver-item{
                        display: flex;
                        flex-direction: row;
                        justify-content: flex-start;
                        align-items: center;
                        .driver-image{
                            width: 76px;
                            height: 76px;
                            border-radius: 38px;
                            margin-right: 20px;;
                        }
                        .driver-name{
                            font-family: 'Open-Sans-Regular';
                            font-size: 14px;
                        }
                    }
                }
            }
            .close{
                position: absolute;
                top: 30px;
                right: 30px;
                cursor: pointer;
            }
        }

        .flex-row{
            display: flex;
            justify-content: space-evenly;
            flex-direction: row;
            .footer-button{
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
}
</style>