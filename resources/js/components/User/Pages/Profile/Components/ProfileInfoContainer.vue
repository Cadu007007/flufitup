<template>
  <div class="info-container">
    <div class="left">
        <p class="title">{{title}}</p>
        <p class="text">{{value}}</p>
    </div>
    <div class="right">
        <div class="verified" v-if="status ==1">Verified</div>
        <div class="not-verified" v-else-if="status ==0">Not Verified</div>
    </div>
</div>
</template>

<script>
export default {
props: ['title','value','status']
}
</script>

<style lang="scss">

$black: #000000;
$grey: #00000099;
$red: #FF0000CC;
$green: #007C09;

 .info-container{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    margin: 10px 0;
    .left{

    .title{
        font-size: 14px;
        font-weight: bold;
        color: $black;
    }
    .text{
        color: $grey;
        font-size: 14px;
        margin-top: 2px;
    }
    }
    .right{
        .not-verified{
            color: $red;
            font-size: 14px;
        }
        .verified{
            
            color: $green;
            font-size: 14px;
        }
    }
        }
</style>