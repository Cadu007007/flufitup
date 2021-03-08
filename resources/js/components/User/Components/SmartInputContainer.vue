<template>
  <div class="SmartInputContainer">
    <label  class="label" :for="inputName" > {{ title }}</label>
    <input class="input" :class="disabled ? 'text-muted' : ''" :name="inputName" :maxlength="maxlength" :placeholder="placeholder" 
    :type="type" v-model="inputtext"
    :disabled="disabled"
    @keyup="$emit('input-keyup')" :id="inputid"
    @keydown="$emit('input-keydown')"
    >
  </div>
</template>

<script>
export default {
  data() {
    return {
      inputtext: this.inputval,
    }
  },
props:['title','inputName','placeholder','type','maxlength','inputid','inputval','disabled']
}
</script>

<style lang="scss">
$white: #FFFFFF;
$black: #000000;
$container-height: 82px;

.SmartInputContainer{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    height: $container-height;
    
    .label{
        font-size: 16px;
        font-family: 'Lato-Bold';
        margin-bottom: 18px;;
        color: $black;
    }
    .input{
        color: $black;
        width: 100%;
        height: 45px;
        background: $white;
        padding: 14px 24px;
        border-radius: 23px;
        font-size: 14px;
    }

}
</style>