<template>
  <div class="OrderDetailsModal" v-if="showOrderDetailsModal">
    <div class="darker">
        <div class="order-details-card position-relative">
            <p class="title">Order Details</p>
            <span class="close position-absolute" style="right:21px; top:24px"  @click="$emit('hide-modal')">X</span>
            <OrderDetail name="Order Number" :value="orderNumber"/>
            <OrderDetail name="Start Date" :value="startDate"/>
            <OrderDetail name="Finish Date" :value="finishDate"/>
            <OrderDetail name="Status" :value="status"/>
            <OrderDetail name="Total Price" :value="totalPrice"/>
            <OrderDetail name="Service Selected" :value="serviceSelected"/>
            <OrderDetail name="Service return duration" :value="serviceReturnDuration"/>
            <OrderDetail name="Added value service" :value="addedValueService"/>
            <OrderDetail name="Package duration" :value="packageDuration"/>
            <OrderDetail name="No. of Pickups per package" :value="numberOdPickupsPerPackage"/>
            <OrderDetail name="Volume per package" :value="volumePerPackage"/>
            <OrderDetail name="No. of Bags per package" :value="numberOfBagsPerPackage"/>
            <OrderDetail name="Pickup address" :value="pickupAddress"/>
            <OrderDetail name="Drop off address" :value="dropOffAddress"/>
            <OrderDetail name="Added Notes" :value="addedNotes"/>
            <div class="d-flex flex-row mt-2 mb-3 justify-content-center">
              <button class="btn btn-primary px-4" @click="$emit('go-to-edit')"  style="border-radius: 30px">Edit</button>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
  import OrderDetail from '../../../Components/OrderDetail'
export default {
components:{
  OrderDetail
},
props: ['showOrderDetailsModal',
        'orderNumber',
        'startDate',
        'finishDate',
        'status',
        'totalPrice',
        'serviceSelected',
        'serviceReturnDuration',
        'addedValueService',
        'packageDuration',
        'numberOdPickupsPerPackage',
        'volumePerPackage',
        'numberOfBagsPerPackage',
        'pickupAddress',
        'dropOffAddress',
        'addedNotes',
        ],
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$blue: #22AEE4;
@mixin flex-center-center{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
}

@mixin flex-start-center{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
}


.OrderDetailsModal{
    .darker{
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba($color: #000000, $alpha: 0.4);
        z-index: 2;
        @include flex-center-center;

    }
    .order-details-card{
        @include flex-start-center;
      width: 700px;
      min-height: 646px;
      background: $white;
      border-radius: 40px;
      padding: 24px;
      .title{
        font-family: 'Lato-Bold';
        font-size: 18px;
        color: $blue;
        margin-bottom: 20px;;
      }  
      
    }
}
</style>