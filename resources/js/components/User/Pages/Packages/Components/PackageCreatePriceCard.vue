<template>
  <div class="PackageCreatePriceCard">
    <div class="title">Package Price</div>
    <div class="price">{{price}} {{ currency }}</div>

    <div class="button-container">
        <button class="place-order">Done</button>
    </div>

  </div>
</template>

<script>
export default {
    props:['price','currency']
}
</script>

<style lang="scss">

$white: #ffffff;
$red: #FF0000CC;
$green: #00C319;
$blue: #22AEE4;

.PackageCreatePriceCard{
    background: $white;
    width: 444px;
    height: 162px;
    margin-top: 24px;
    border: 1px solid #E7E7E7;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 12px 0;
    background: $blue;
    color: $white;
    .title{
        font-size: 16px;
        font-family: 'Lato-Bold';
    }
    .price{
        font-size: 30px;
        margin: 12px 0;
        font-family: 'Lato-Bold';
    }    

    .button-container{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-bottom: 36px;
        .place-order{
            width: 168px;
            height: 40px;
            background: $white;
            color: $blue;
            border-radius: 35px;
            font-size: 14px;
        }
        }

}
</style>