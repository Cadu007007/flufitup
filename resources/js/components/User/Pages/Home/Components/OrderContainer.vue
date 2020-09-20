<template>
  <div class="OrderContainer">
    <div class="order-card">

        <div class="order-header">
            <b>Order ID</b> {{ orderId }}
        </div>
        <div class="order-info">
            <div class="order-info-container">
                <p class="title">
                    Your Service
                </p>
                <p class="value">
                    {{ service }}
                </p>

            </div>

            <div class="order-info-container">
                <p class="title">
                    Start Date
                </p>
                <p class="value">
                    {{ startDate }}
                </p>

            </div>
            <div class="order-info-container">
                <p class="title">
                    Price
                </p>
                <p class="value">
                    {{ price }}
                </p>

            </div>
        </div>
        <div class="button-container">
            <button class="order-detailsbutton" @click="$emit('show-modal')">Order Details</button>
        </div>
    </div>
    <p class="view-order-schedule">View Pickup Schedule</p>

  </div>
</template>

<script>
export default {
  props: ['orderId','service','startDate','price']
}
</script>

<style lang="scss">
$small-shadow: 0px 0px 10px #0000001A;
$white: #FFFFFF;
$black: #000000;
$blue: #22AEE4;
$orange: #FDBD42;

.OrderContainer{
    width: 628px;
    height: fit-content;
    margin: 40px auto;

.order-card{

    background: $white;
    box-shadow: $small-shadow;
    border-radius: 20px;
    height: 265px;
        .order-header{
            padding: 15px 24px;
            background: $blue;
            border-radius: 20px 20px 0px 0px;
            color: $white;
            height: 50px;
        }

        .order-info{
        padding: 0 24px;
        background: $white;

        .order-info-container{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            height: 20px;
            margin: 24px 0;
            .title{
                color: $blue;
                font-size: 16px;
            }
            .value{
                color: $black;
                font-size: 16px;

            }
        }


        }
        .button-container{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
            margin-bottom: 36px;

        .order-detailsbutton{
            width: 168px;
            height: 40px;
            background: $blue;
            border-radius: 35px;
            font-size: 14px;
            color: $white;
        }
        }
    }


   
  .view-order-schedule{
      font-size: 18px;
      color: $orange;
      width: 100%;
      text-align: center;
      margin-top: 70px;
      cursor: pointer;
  }
}
</style>