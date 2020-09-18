<template>
  <div class="WelcomePanner">
    <div class="left">
    
    <p class="title">{{title}}</p>
    <p class="description">{{description}}</p>
  </div>
  <div class="right">
      <img class="vector" :src=vector alt="">
  </div>
    </div>
</template>

<script>
export default {
  props: ['title','description','vector']

}
</script>

<style lang="scss">
$light-orange: #FDBD4259;
$small-shadow: 0px 0px 10px #0000001A;
$white: #FFFFFF;

$panner-height: 100px;
$panner-text-width: 300px;
.WelcomePanner{
  height: $panner-height;
  width: 100%;
  background: $light-orange;
  box-shadow:$small-shadow ;
  border-radius: 10px;
  padding: 0 48px;
  display: grid;
  grid-template-columns: $panner-text-width auto;
  .left{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    width: $panner-text-width;
    color: $white;
    text-align: left;
    .title{
      font-size: 21px;
    }
    .description{
      font-size: 12px;
    }
  }
  .right{
    position: relative;    
    .vector{
      width: 122px;
      height: 144px;
      position: absolute;
      bottom: 0;
      right: 30px;
    }
  }
}
</style>