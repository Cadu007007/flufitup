<template>
  <div class="NumberOfOrdersCard">
  <p class="title">Number Of Orders Per Day</p>
  <p class="value">{{ value }}</p>
  <p class="edit" @click="$emit('open-orders-number-modal')">Edit</p>
    
  </div>
</template>

<script>
export default {
    props:['value']

}
</script>

<style lang="scss">
$white: #fff;
$grey: #00000080;
$black: #000;
$orange: #FFA800;
.NumberOfOrdersCard{
    background: $white;
    width: 260px;
    height: 153px;
    box-shadow: 0px 0px 10px #00000033;
    border-radius: 20px;
    border: 2px solid #F9F9F9;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    padding: 10px;
    .title{
        color: $black;
        font-family: 'Open-Sans-Semibold';
        font-size: 14px;
        text-align: center;
    }
    .value{
         color: $orange;
        font-family: 'Open-Sans-Bold';
        font-size: 24px;
        height: 35px;
    }
    .edit{
        color: $grey;
        font-family: 'Open-Sans-Semibold';
        font-size: 12px;
        cursor: pointer;
    }
    
}
</style>