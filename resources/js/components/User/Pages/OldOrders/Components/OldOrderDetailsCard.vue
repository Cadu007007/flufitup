<template>
  <div class="OldOrderDetailsCard">
        <p class="title">Order Details</p>

        <OrderDetail class="detail-container" name="Order Number" :value="oldOrder[0].id"/>
        <OrderDetail class="detail-container" name="Start Date" :value="oldOrder[0].start_date"/>
        <OrderDetail class="detail-container" name="Finish Date" :value="oldOrder[0].finish_date"/>
        <OrderDetail class="detail-container" name="Status" :value="oldOrder[0].status"/>
        <OrderDetail class="detail-container" name="Total Price" :value="oldOrder[0].price"/>
        <OrderDetail class="detail-container" name="Service Selected" :value="oldOrder[0].service"/>
        <OrderDetail class="detail-container" name="Service return duration" :value="oldOrder[0].service_return_duration"/>
        <OrderDetail class="detail-container" name="Added value service" :value="oldOrder[0].added_value_service"/>
        <OrderDetail class="detail-container" name="Pickup address" :value="oldOrder[0].pickup_address"/>
        <OrderDetail class="detail-container" name="Drop off address" :value="oldOrder[0].drop_off_address"/>
        <OrderDetail class="detail-container" name="Added Notes" :value="oldOrder[0].added_notes"/>
    </div>
</template>

<script>
  import OrderDetail from '../../../Components/OrderDetail'
export default {
    props: ['oldOrder'],
components:{
    OrderDetail
}
}
</script>

<style lang="scss">

$white: #FFFFFF;
$black: #000000;
$blue: #22AEE4;
$grey: #00000099;
$shadow: 0px 0px 10px #0000001A;
.OldOrderDetailsCard{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;      width: 700px;
        width: 520px;
        height: 561px;
        background: $white;
        border-radius: 40px;
        padding: 24px;
        box-shadow: $shadow;
    .title{
        font-family: 'Lato-Bold';
        font-size: 18px;
        color: $blue;
        margin-bottom: 24px;;
    }  
    .detail-container{
        margin: 8px 0;
        .name{
        font-family: 'Lato-Regular';
        font-weight: bold;
        }
        .value{
            color: $grey;
        }
    }
      
    }

</style>