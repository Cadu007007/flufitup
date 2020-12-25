<template>
  <div class="PackagePriceCard">
    <div class="title">Package Price</div>
    <input class="package-price" type="text" placeholder="Package Price" v-model="formatedPrice">

    <div class="button-container">
        <button class="edit-button" @click="$emit('go-to-edit-package')">Edit Package</button>
    </div>

  </div>
</template>

<script>
export default {
    props:['price','currency'],
    data(){
        return{
            formatedPrice : this.currency+this.price 
        }
    }
}
</script>

<style lang="scss">

$white: #ffffff;
$red: #FF0000CC;
$green: #00C319;
$blue: #22AEE4;

.PackagePriceCard{
    background: $white;
    width: 330px;
    height: 180px;
    margin-top: 24px;
    border: 1px solid #E7E7E7;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    background: $white;
    color: $blue;
    .title{
        font-size: 16px;
        font-family: 'Lato-Bold';
    }

    .package-price{
        width: 280px;
        height: 40px;
        background: #F9F9F9;
        padding: 13px 24px;
        border: 1px solid #EDEDED;
        border-radius: 7px;
        margin: 0 auto;
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
        margin-bottom: 10px;
            .edit-button{
                width: 168px;
                height: 40px;
                background: $blue;
                color: $white;
                border-radius: 35px;
                font-size: 14px;
            }
        }

}
</style>