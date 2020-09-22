<template>
  <div class="Accordion">
    <div class="header"   @click="changeIsOpenState">
        <p class="title">{{title}}</p>
        <img :src=" isOpen ? '/images/icons/arrow-up.svg' : '/images/icons/arrow-down.svg' " alt="">
    </div>
     <div class="options" v-show="isOpen">
        <div class="option" v-for="(option,index) in options" :key="index">
            <input class="radio" type="radio" :checked="index == 0" :name="name" :value="option.value" id="">
            <label class="option-label" for="filter">{{option.title}}</label>
        </div> 

        <!--
        <div class="option">
            <input class="radio" type="radio" :name="name" value="three_months" id="">
            <label class="option-label" for="filter">Wash, Fold and Dry Clean</label>
        </div>
        <div class="option">
            <input class="radio" type="radio" :name="name" value="custom_search" id="">
            <label class="option-label" for="filter">Dry Clean Service with Delivery</label>
        </div>
        <div class="option">
            <input class="radio" type="radio" :name="name" value="custom_search" id="">
            <label class="option-label" for="filter">Dry Clean Delivery Service Only</label>
        </div>
        -->
     </div>

  </div>
</template>

<script>
export default {
    props: ['title','name','options','isOpen'],
    methods: {
        changeIsOpenState(){
            this.isOpen = ! this.isOpen
        }
    },
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$grey: #F1F3F7;
$shadow: 0px 0px 10px #0000001A;
.Accordion{
    width: 100%;
    box-shadow: $shadow;
    border-radius: 10px 10px 0px 0px;
    .header{
        height: 60px;
        background: $grey;
        padding: 16px 24px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        .title{
            font-size: 18px;
        }
    }

    .options{
        width: 100%;
        height: fit-content;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        background: $white;
        padding: 24px 48px;

        .option{
            margin-bottom: 16px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 24px;
            .radio{
                width: 24px;
                height: 24px;
                color: $black;
            }
            .option-label{
                margin-left: 24px;
                font-size: 14px;
                color: $black;
            }
        }
    }

}
</style>