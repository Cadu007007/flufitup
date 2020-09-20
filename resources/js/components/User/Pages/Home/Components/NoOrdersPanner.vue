<template>
  <div class="NoOrdersPanner">
    <p class="text"> {{text}}</p>
  </div>
</template>

<script>
export default {
  props: ['text']

}
</script>

<style lang="scss">
$small-shadow: 0px 0px 10px #0000001A;
$white: #FFFFFF;
$panner-height: 150px;
$panner-text-width: 300px;

.NoOrdersPanner{
  height: $panner-height;
  width: 100%;
  background: $white;
  border-radius: 20px;
  padding: 0 48px;
  box-shadow:$small-shadow ;  
  display: flex;
  justify-content: center;
  align-items: center;
  .text{
    font-size: 21px;
  font-weight: bold;
  }
}
</style>