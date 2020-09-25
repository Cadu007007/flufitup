<template>
    <div class="PickupDataColumn">
        <div class="pickup-header" :class="state > 0 ? 'orange' : '' ">
            {{ title }}
        </div>
        <PickupInfoItem title = "Pickup Day/s" :value="day" />
        <PickupInfoItem title = "Pickup Date/s" :value="date" />
        <PickupInfoItem title = "Pickup Time" :value="time" />
        <PickupInfoItem title = "Volumes per Pickup" :value="volume" />
        <PickupInfoItem title = "No. of Bags per pickup" :value="numberofbags" />
        <PickupInfoItem title = "Dry Clean Included" :value="drycleanincluded" />
    </div>
</template>

<script>
import PickupInfoItem from './PickupInfoItem'

export default {
    props: ['title','state','day','date',
            'time','volume','numberofbags','drycleanincluded'],
components:{
        PickupInfoItem
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
.PickupDataColumn{
    width: 100%;
    &:nth-child(1){
        border-right: 1px solid $dark-white;
    }
    &:nth-child(2){
        border-left: 1px solid $dark-white;
    }


    .pickup-header{
        display: flex;
        justify-content: center;
        align-items: center;
        background: $grey;
        height: 40px;
        color: $white;
        &.orange{
            background: $orange !important;
        }
    }
    

}
</style>