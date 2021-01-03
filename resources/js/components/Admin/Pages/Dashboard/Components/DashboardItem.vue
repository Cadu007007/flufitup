<template>
  <div class="DashboardItem" @click="goToTheRoute">
    <p class="value" :style="{ color: color }" v-if="showvalue == true">{{ value }}</p>
    <p class="title">{{ title }} </p>
  </div>
</template>

<script>
export default {
    props:['value','title','color','gotoroute','showvalue'],
    methods: {
      goToTheRoute(){
        window.location.href = this.gotoroute
      }
    },

}
</script>

<style lang="scss">
.DashboardItem{
    background: #fff;
width: 130px;
height: 118px;
border-radius: 20px;
border: 2px solid #F9F9F9;
box-shadow: 0px 0px 10px #00000033;
display: flex;
flex-direction: column;
justify-content: space-evenly;
align-items: center;
padding: 10px 0px;
cursor: pointer;
.value{
    font-size: 24px;
    font-family: 'Open-Sans-Bold';
}
.title{
    font-size: 14px;
    font-family: 'Open-Sans-Semibold';
    color: #111;
    text-align: center;
}
}

</style>