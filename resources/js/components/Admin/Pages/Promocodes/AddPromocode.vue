<template>
<div class="AddPromocode">
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <form action="/dummy" method="post">
          <input type="hidden" :value="csrf" name="_token"/>
        <div class="form-container">
            <div class="input-row">
                <p class="title">Promo Code :</p>
                <input type="text" class="input" name="name" placeholder="Promocode">
            </div>
            <div class="input-row">
                <p class="title">Start Date :</p>
                <input type="text" :value="startDate" class="input" name="start_date" placeholder="MM/DD/YYYY" @click="showCalendar(1)">
            </div>
            <div class="input-row">
                <p class="title">End Date :</p>
                <input type="text" :value="endDate" class="input" name="end_date"  placeholder="MM/DD/YYYY" @click="showCalendar(2)">
            </div>
            <div class="input-row">
                <p class="title">Status :</p>
                <select class="input" name="status"  placeholder="Status">
                    <option value="">Status</option>
                </select>
            </div>
            <div class="button-container">
                <button class="save-button" type="submit" >Save</button>
            </div>
        </div>
    </form>

<div class="modal" v-if="activeCalendar == 1 || activeCalendar == 2 " @keydown.esc="closeModal"  tabindex="0">
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
props: ['title','date'],
data() {
    return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        activeCalendar: 0,
        startDate:'',
        endDate:'',
        wrapperStyles: { width: "100%" },
        headerStyles: { width: '350px', margin: '0 auto', background: "#fff", color: "#000" , fontWeight: 'bolder', fontFamiley: 'Lato-Bold' },
        primaryColor: "#FDBD42",

    }
},
    components: {
        "custom-datepicker": CustomDatepicker
    },
    methods: {
        setStartDate(date) {
            this.startDate = date;
            this.closeModal()
    },
       setEndDate(date) {
            this.endDate = date;
            this.closeModal()
    },
    showCalendar(no){
        this.activeCalendar= no
        document.getElementsByTagName("body")[0].style.overflow = "hidden";
    },
    closeModal() {
        this.activeCalendar= 0
        document.getElementsByTagName("body")[0].style.overflow = "auto";
    }
},
}
</script>

<style lang="scss">
$text-grey: #00000080;
$blue: #22AEE4;
$white: #fff;

.AddPromocode{
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
    .form-container{
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
            .title{
            color: $text-grey;
            font-size: 16px;
            font-family: 'Open-Sans-Semibold';
            }
            .input{
                width: auto;
                max-width: 628px;
                background: #F9F9F9;
                border: 2px solid #EDEDED;
                border-radius: 7px;
                padding: 12px;
            
            }
}

        }
        .button-container{
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            .save-button{
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
        .modal{
            width: 100%;
            height: 100%;
            background: rgba($color: #000000, $alpha: 0.6);
            position: absolute;
            top: 0;
            left: 0;    
        }
    }


</style>