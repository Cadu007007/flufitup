<template>
  <div class="EditNumberOfOrdersWallet">
      <div class="darker" @click="$emit('hide-modal')"></div>
        <div class="card">
            <p class="title">Change Number of Orders per day</p>
            <input type="number" min="1" class="amount" placeholder="Type the Number of Orders" :value="value">
            <button class="submit" @click="submitValue">Submit</button>
        </div>
    
  </div>
</template>

<script>
export default {
    props: ['value'],
    methods: {
        submitValue(){
            this.$emit('hide-modal')
        }
    },

}
</script>

<style lang="scss">
$white: #F9F9F9;
$grey: #E8ECF3;
$blue:#22AEE4;
$grey-text:#ACACAC;
$orange: #FFA800;

.EditNumberOfOrdersWallet{

    .darker{

            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba($color: #000000, $alpha: 0.4);
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            
    }
    .card{
        position: absolute;
        z-index: 3;
        top: 30%;
        transform: translateY(-50%) ;
        left: 50%;
        transform: translateX(-50%);
        width: 536px;
        height: 258px;
        background: $grey;
        border: 1px solid $white;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 24px;
        .title{
            font-size: 16px;
            color: $blue;
            font-family: 'Open-Sans-Bold';
        }
        .amount{
            width: 352px;
            height: 100px;
            background: $white;
            margin: 24px 0;
            font-size: 25px;
            font-family: 'Open-Sans-Bold';
            text-align: center;
            color: $orange;
            border-radius: 15px;
;
        }
        .submit{
            width: 200px;
            height: 40px;
            background: #22AEE4 0% 0% no-repeat padding-box;
            box-shadow: 2px 2px 4px #00000033;
            border-radius: 35px;
            font-size: 18px;
            color: $white;
        }
    }
}
</style>