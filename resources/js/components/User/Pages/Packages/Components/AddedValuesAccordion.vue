<template>
<div class="ComponentContainer">
  <div class="AddedValuesAccordion">
    <div class="header"   @click="changeIsOpenState()">
        <p class="title">{{title}}</p>
        <img :src=" openState ? '/images/icons/arrow-up.svg' : '/images/icons/arrow-down.svg' " alt="">
    </div>
    <!--  :checked="index == 0" -->
     <div class="options" v-show="openState">
        <div class="option" v-for="(option,index) in options" :key="index">
            <input class="radio" type="radio" @click="labelClicked" :name="name" :value="option.value" id="">
            <label class="option-label" @click="labelClicked" for="filter">{{option.title}}</label>
        </div> 
     </div>
  </div>

    <div class="flex-row flex-wrap" :class="openChoices && showChoices ? 'd-flex ' : 'd-none'">
        <div class="col-lg-4 my-1 mt-2" v-for="(choice,index) in addedvaluechoices" :key="index">
            <input class="input" type="checkbox" :name="choice.name">
            <label class="label" @click="choiceClicked" :for="choice.name">{{choice.title}}</label>
        </div>
    </div>


</div>
</template>

<script>
export default {
    data(){
        return {
            openState: this.isopen,
            openChoices: false,
            showChoices: false,
        }
    },
    props: ['title','name','options','isopen','addedvaluechoices'],
    methods: {
        changeIsOpenState(){
            this.openState = !this.openState;
            this.openChoices = this.openState
        },
        labelClicked(event){
            // check the input
            event.target.closest('.option').getElementsByClassName('radio')[0].click()
            this.showChoices = true
        },
        choiceClicked(event){
            event.target.closest('.added-value').getElementsByClassName('input')[0].click()
        }
    },
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$grey: #F1F3F7;
$shadow: 0px 0px 10px #0000001A;
.ComponentContainer{
    width: 100%;
.AddedValuesAccordion{
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

}
</style>