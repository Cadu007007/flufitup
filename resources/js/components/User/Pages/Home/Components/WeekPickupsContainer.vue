<template>
  <div class="WeekPickupsContainer">
    <div class="header" :class="activepickups > 0 ? 'blue' : '' ">
        <p class="title">
         {{ title }}
        </p>
    </div>
    <div class="pickups-container">
        <PickupDataColumn
            title= "Pickup One"
            :state="pickuponestate"
            :day="pickuponeday"
            :date="pickuponedate"
            :time="pickuponetime"
            :volume="pickuponevolume"
            :numberofbags="pickuponenubmerofbags"
            :drycleanincluded="pickuponedrycleanincluded"
        />
        <PickupDataColumn
            title= "Pickup Two"
            :state="pickuptwostate"
            :day="pickuptwoday"
            :date="pickuptwodate"
            :time="pickuptwotime"
            :volume="pickuptwovolume"
            :numberofbags="pickuptwonubmerofbags"
            :drycleanincluded="pickuptwodrycleanincluded"
        />        
    </div>


    <div class="button-container" v-if="pickuponestate || pickuptwostate">
        <button type="button" class="modify-button">
            Modify
        </button>
    </div>

  </div>
</template>

<script>
import PickupDataColumn from './PickupDataColumn'
export default {
    props: ['title','activepickups','pickuponestate','pickuptwostate',
            'pickuponeday',
            'pickuponedate',
            'pickuponetime',
            'pickuponevolume',
            'pickuponenubmerofbags',
            'pickuponedrycleanincluded',
            'pickuptwoday',
            'pickuptwodate',
            'pickuptwotime',
            'pickuptwovolume',
            'pickuptwonubmerofbags',
            'pickuptwodrycleanincluded'
    ],
    components:{
        PickupDataColumn
    }

}
</script>

<style lang="scss">
$white: #FFFFFF;
$blue: #22AEE4;
$orange: #FDBD42;
$dark-white: #70707033;
$grey: #0000004D;
$dark-grey: #00000080;
$title-color: #00000066;

$shadow: 0px 0px 10px #0000001A;
.WeekPickupsContainer{
    width: 100%;
    min-height: 403px;
    background: $white;
    border-radius: 20px;
    box-shadow: $shadow;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-content: center;
    
    .header{
        display: flex;
        justify-content: center;
        align-items: center;
        background: $dark-grey;
        color: $white;
        text-align: center;
        height: 40px;
        border-radius: 20px 20px 0px 0px;
        &.blue{
            background: $blue !important;
        }
    }

    .pickups-container{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .button-container{
        margin: 40px auto 20px auto;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        .modify-button{
            width: 168px;
            height: 40px;
            border-radius: 20px;
            background: $blue;
            color: $white;
            font-size: 14px;
        }
    }
}
</style>