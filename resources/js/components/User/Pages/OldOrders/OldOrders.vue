<template>
  <div class="OldOrders">
     <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
     </div>

     <div class="filter-options">
        <div class="filter">
            <input class="radio" type="radio" checked  @click="isCustomSearch = false" name="filter" value="recent" id="">
            <label class="filter-label" for="filter">Recent</label>
        </div> 
        <div class="filter">
            <input class="radio" type="radio" @click="isCustomSearch = false" name="filter" value="three_months" id="">
            <label class="filter-label" for="filter">Last Three Months</label>
        </div>
        <div class="filter">
            <input class="radio" type="radio" @click="isCustomSearch = true" name="filter" value="custom_search" id="">
            <label class="filter-label" for="filter">Custom Search</label>
        </div>
     </div>

    <form action="" method="post">
        <input type="hidden" :value="csrf" name="_token"/>
        <div class="custom-search-container" v-if="isCustomSearch">
            <input class="custom-search-input" type="date" name="start_date" placeholder="Start Date">
            <input class="custom-search-input" type="date" name="end_date" placeholder="End Date">
            <button class="custom-search-button" type="submit">
                <img src="/images/icons/search.svg" alt="">
            </button>
        </div>
    </form>

     <div class="orders-container">
        <OrderContainer v-for="(item,index) in orders" :key="index"
            :ordernumber="item.ordernumber"
            :orderdate="item.orderdate"
            :startdate="item.startdate"
            :finishdate="item.finishdate"
            :status="item.status"
            @show-order-details="showOrder(item.ordernumber)"
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
            isCustomSearch: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

        }
    },
    props:['date','orderdate','ordernumber','startdate','finishdate','status','orders','showorderroute'],
    components:{
        OrderContainer,
    },
    methods: {
        showOrder(orderNumber){
            var showOrderURL = this.showorderroute.replace('order_id',orderNumber)
            window.location.href = showOrderURL
        }
    },
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$text-grey: #00000066;
$grey: #00000099;
$blue: #22AEE4;
$orange: #FDBD42;
$shadow: 0px 0px 10px #0000001A;

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

    .custom-search-container{
        width: 600px;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        margin: 40px auto 10px auto;
        .custom-search-input{
            width: 220px;
            height: 45px;
            border-radius: 10px;
            box-shadow: $shadow;
            padding: 14px 24px;
            font-size: 14px;
            color: $text-grey;

        }
        .custom-search-button{
            width: 76px;
            height: 45px;
            background: $blue;
            border-radius: 10px;
            box-shadow: $shadow;
        }
    }
}
</style>

