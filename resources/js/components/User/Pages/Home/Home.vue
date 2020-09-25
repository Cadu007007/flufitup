<template>
<div class="Home">

  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

<WelcomePanner 
  class="WelcomePanner"
  title="Welcome, Mohamed" 
  description="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"
  vector="/images/welcome-vector.svg" />

<NoOrdersPanner v-if="!orders.length" text="No Active Orders Yet" />
<OrderContainer
  v-for="(order,index) in orders" :key="index" 
  :orderId="order.id" 
  :service="order.service"
  :startDate="order.start_date"
  :price="order.price"
  @show-modal="showDetailsModal(index)"
  @go-to-edit-order="goToEditOrder(order.id)"
 />

<!--  :showOrderDetailsModal="showModal"  -->
 <OrderDetailsModal
 :showOrderDetailsModal="showModal"
  @hide-modal="hideDetailsModal"
  :orderNumber="orders[selectedOrderIndex].id"
  :startDate="orders[selectedOrderIndex].start_date"
  :finishDate="orders[selectedOrderIndex].finish_date"
  :status="orders[selectedOrderIndex].status"
  :totalPrice="orders[selectedOrderIndex].price"
  :serviceSelected="orders[selectedOrderIndex].service"
  :serviceReturnDuration="orders[selectedOrderIndex].service_return_duration"
  :addedValueService="orders[selectedOrderIndex].added_value_service"
  :packageDuration="orders[selectedOrderIndex].package_duration"
  :numberOdPickupsPerPackage="orders[selectedOrderIndex].number_of_pickups_per_package"
  :volumePerPackage="orders[selectedOrderIndex].volume_per_package"
  :numberOfBagsPerPackage="orders[selectedOrderIndex].number_of_bags_per_package"
  :pickupAddress="orders[selectedOrderIndex].pickup_address"
  :dropOffAddress="orders[selectedOrderIndex].drop_off_address"
  :addedNotes="orders[selectedOrderIndex].added_notes"

  />


</div>
</template>



<script>
import WelcomePanner from './Components/WelcomePanner';
import NoOrdersPanner from './Components/NoOrdersPanner';
import OrderContainer from './Components/OrderContainer';
import OrderDetailsModal from './Components/OderDetailsModal';

export default {
  data() {
    return {
      title: 'Home',
      showModal: false,
      selectedOrderIndex: 0
    }
  },
  props: ['date','orders','editorderroute'],
  components:{
    WelcomePanner,
    NoOrdersPanner,
    OrderContainer,
    OrderDetailsModal
  },
  methods: {
    showDetailsModal(index){
      this.showModal = true;
      document.getElementsByTagName('body')[0].style.overflow = "hidden"
      this.selectedOrderIndex = index
    },
    hideDetailsModal(){
      this.showModal = false;
      document.getElementsByTagName('body')[0].style.overflow = "auto"
    },
    goToEditOrder(id){
      var url = this.editorderroute.replace('order_id', id)
      window.location.href= url
    }

  },

}
</script>

<style lang="scss">
$text-grey: #00000066;


.Home{
  padding: 0 140px 0 16px;
.page-header{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  .title{
  margin: 26px 0;
  font-size: 12px;
  font-weight: bold;
  }
    .date{
    font-size: 10px;
    color: $text-grey;
  }

}
.WelcomePanner{
  margin-bottom: 30px;
}

.NoOrdersPanner{
    margin-top: 30px;
}
}
</style>

