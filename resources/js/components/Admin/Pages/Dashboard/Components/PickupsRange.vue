<template>
  <div class="PickupsRange">
  <p class="title">Specific Pickups Range</p>
  <p class="value">{{ value }}</p>
  <p class="edit" @click="$emit('open-pickups-range-modal')">Edit</p>
    <input class="date-input" type="date" v-model="firstEffectiveDate" name="first_effective_date" @change="$emit('first-date-changed',firstEffectiveDate)">
    <input class="date-input" type="date" v-model="secondEffectiveDate" name="second_effective_date" @change="$emit('second-date-changed',secondEffectiveDate)">
  </div>
</template>

<script>
export default {
    props:['value'],
    data(){
        return{
            firstEffectiveDate:'',
            secondEffectiveDate:'',
        }
    }

}
</script>

<style lang="scss">
$white: #fff;
$grey: #00000080;
$black: #000;
$orange: #FFA800;
.PickupsRange{
    background: $white;
    width: 260px;
    height: 195px;
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
    .date-input{
        border: 1px solid #ccc;
        padding: 5px;
        width: 150px;
        text-align: center;
        margin-top: 10px;
        border-radius: 10px;
    }
    
}
</style>