<template>
<div class="OldOrderDetails">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

  <div class="page-container">
    <Old-Order-Details-Card 
    class="order-card"
    :oldOrder="order"
    />

    <Order-Rate 
    class="order-rate"
   :formactionroute="feedbackactionroute"
    />
  </div>
</div>

</template>


<script>
import OldOrderDetailsCard from './Components/OldOrderDetailsCard' 
import OrderRate from './Components/OrderRate' 
export default {
  data() {
    return {
      title: 'Old Order Details'
    }
  },
  props: ['date','order','feedbackactionroute'],
  components:{
    OldOrderDetailsCard,
    OrderRate
  }
}
</script>
<style lang="scss">
$text-grey: #00000066;

.OldOrderDetails{
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

.page-container{
  display: flex;
  flex-direction: row;
  justify-content: flex-start;
  align-items: flex-start;
  flex-wrap: wrap;
  .order-card{
    margin: 8px 8px 8px 0;
  }
  .order-rate{
    margin: 8px 0;
  }
}

}
</style>

