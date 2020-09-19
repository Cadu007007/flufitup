<template>

<div class="order-container">
    <p class="order-date">{{orderdate}}</p>
    <div class="order-card">
        <div class="order-detail">
            <p class="title">Order Number</p>
            <p class="value">{{ordernumber}}</p>
        </div>
        <div class="order-detail">
            <p class="title">Start Date</p>
            <p class="value">{{startdate}}</p>
        </div>
        <div class="order-detail">
            <p class="title">Finish Date</p>
            <p class="value">{{ finishdate }} </p>
        </div>
        <div class="order-detail">
            <p class="title">Status</p>
            <p class="value">{{ status }} </p>
        </div>
            <a href="" class="view-order-details">View Order Details</a>
        <div class="show-details">
        </div>
    </div>
</div>

</template>

<script>
export default {
    props:['orderdate','ordernumber','startdate','finishdate','status']
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$text-grey: #00000066;
$grey: #00000099;
$blue: #22AEE4;
$orange: #FDBD42;


.order-container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 15px auto;
    .order-date{
        font-size: 16px;
        color: $blue;
        margin-bottom: 24px;
    }
    .order-card{
        width: 536px;
        height: 187px;
        background: $white;
        border-radius: 25px;
        padding: 12px 24px 0 24px;
        .order-detail{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin: 8px 0;

            .title{
                font-size: 16px;
                color: $black;
                font-weight: bold;
            }
            .value{
                font-size: 16px;
                color: $grey;

            }
        }
        .view-order-details{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            position: relative;
            bottom: 5px;
            color: $orange;
        }
    }
    }
</style>