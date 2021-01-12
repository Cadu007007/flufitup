<template>
  <div class="ShowDriver">
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>


    <div class="container">
        <div class="left">
            <img src="/images/icons/profile.svg" alt="" class="userimage">
            <p class="username">{{ driver[0].name }} </p>
        </div>  

        <div class="right">
            <div class="info-container">
                <p class="title">Birthday :</p>
                <p class="value">{{driver[0].birthday}}</p>
            </div>
            <div class="info-container">
                <p class="title">Phone Number :</p>
                <p class="value">{{driver[0].phone}}</p>
            </div>
            <div class="info-container">
                <p class="title">Address :</p>
                <p class="value">{{driver[0].address}}</p>
            </div>
            <div class="info-container">
                <p class="title">Driver's license number :</p>
                <p class="value">{{driver[0].license}}</p>
            </div>


        </div>  
    </div>

<div class="seperator"></div>
    <div class="car-details-container">
        <p class="title">Car Details</p>


        <div class="container">
            <div class="left"></div>  

            <div class="right">
                <div class="info-container">
                <p class="title">Car Type :</p>
                    <p class="value">{{driver[0].car_type}}</p>
                </div>
                <div class="info-container">
                <p class="title">Car Model :</p>
                    <p class="value">{{driver[0].car_model}}</p>
                </div>
                <div class="info-container">
                <p class="title">Production Date :</p>
                    <p class="value">{{driver[0].car_production_date}}</p>
                </div>
                <div class="info-container">
                <p class="title">Plate Number :</p>
                    <p class="value">{{driver[0].car_plate_number}}</p>
                </div>
            </div>  
        </div>
    </div>
    <div class="seperator"></div>
    <div class="car-details-container">
        <p class="title">Assignments</p>


        <div class="container">
            <div class="left"></div>  

            <div class="right">
                <div class="info-container">
                <p class="title">Zones</p>
                    <p class="value">{{driver[0].zones}}</p>
                </div>
                <div class="info-container">
                <p class="title">Cities</p>
                    <p class="value">{{driver[0].cities}}</p>
                </div>
                <div class="info-container">
                <p class="title">Assignment Date</p>
                    <p class="value">{{driver[0].assignment_date}}</p>
                </div>
                <div class="info-container">
                <p class="title">Shift</p>
                    <p class="value">{{driver[0].shift}}</p>
                </div>
            </div>  
        </div>
    </div>
    <div class="seperator"></div>

<!-- Financials -->
<Financials
:tips="20"
:bonus="20"
/>

    <div class="seperator"></div>

    <div class="buttons-container">
        <button class="button edit" @click="goToEditStaff(driver[0].id )">Edit</button>
        <button class="button delete">Delete</button>
    </div>
  </div>
</template>

<script>
    import Financials from '../../../Components/Financials'

export default {
    props: ['title','date','driver','editdriverroute'],
    components:{
        Financials
    },
    methods: {
        goToEditStaff(id){
            var url = this.editdriverroute.replace('driver_id',id)
            window.location.href= url
        }
    },
}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;
$black: #000;
$green: #00C319;
$red: red;

.ShowDriver{
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
    .container{
  width: 100%;
    display: grid;
    grid-template-columns: 200px 1fr;
    justify-content: flex-start;
    align-content: flex-start;
    .left{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        .userimage{
            width: 140px;
            height: 140px;
            border-radius: 70px;
        }
        .username{
            font-family: 'Open-Sans-Bold';
            font-size: 21px;
            color: $black;
            margin-top: 16px;

        }
    }   
    .right{
        margin-left: 60px;
        .info-container{
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin: 12px auto;
            .title{
                width: 210px;
                font-size: 16px;
                font-family: 'Open-Sans-Semibold';
                color: $text-grey;
            }
            .value{
                font-family: 'Open-Sans-Semibold';
                font-size: 18px;
                color: $black;
            }
            .edit-wallet{
                margin-left: 66px;
                font-size: 14px;
                color: $blue;
                cursor: pointer;
            }
        }
        
    }
    }


    .seperator{
        width: 100%;
        height: 1px;
        background: #ccc;
        margin: 20px auto;
    }
    .car-details-container{
        .title{
            font-size: 18px;
            font-family: 'Open-Sans-Bold';
            color: $blue;
        }
    }

    .buttons-container{
        width: 100%;
        height: fit-content;
        margin: 40px auto;
        display: flex;
        justify-content: center;
        .button{
            width: 170px;
            height: 40px;
            margin: 0 20px;
            border-radius: 20px;
            font-size: 14px;
            font-family: 'Open-Sans-Bold';
            background: #fff;
            &.edit{
            border: 2px solid #FFA800;
                color: #FFA800;
            }
            &.delete{
            border: 2px solid #FF0000;
                color: #FF0000;

            }
        }
    }
    .Financials .title{
        color: $blue !important;

    }
    
}
</style>