<template>
  <div class="OldOrders">
     <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
     </div>

     <div class="filter-options">
        <div class="filter">
            <input class="radio" type="radio" checked name="filter" value="recent" id="">
            <label class="filter-label" for="filter">Recent</label>
        </div> 
        <div class="filter">
            <input class="radio" type="radio" name="filter" value="three_months" id="">
            <label class="filter-label" for="filter">Last Three Months</label>
        </div>
         <div class="filter">
            <input class="radio" type="radio" name="filter" value="custom_search" id="">
            <label class="filter-label" for="filter">Custom Search</label>
        </div>
     </div>

     <div class="orders-container">

        <OrderContainer v-for="(item,index) in orders" :key="index"
            :orderdate="item.orderdate"
            :ordernumber="item.ordernumber"
            :startdate="item.startdate"
            :finishdate="item.finishdate"
            :status="item.status"
         />
        
     </div>
  </div>
</template>

<script>
import OrderContainer from './Components/OrderContainer'
export default {
    data() {
        return {
            title: 'Old Orders',
        }
    },
    props:['date','orderdate','ordernumber','startdate','finishdate','status','orders'],
    components:{
        OrderContainer,
    }
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$text-grey: #00000066;
$grey: #00000099;
$blue: #22AEE4;
$orange: #FDBD42;

.OldOrders{
        padding: 0 139px 0 16px;
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
    .filter-options{
        width: 100%;
        height: 24px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
        .filter{
            margin: 0 24px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            .radio{
                width: 24px;
                height: 24px;
                color: $black;
            }
            .filter-label{
                margin-left: 24px;
                font-size: 14px;
                color: $black;
            }
        }
    }

    .orders-container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
    }
}
</style>

