<template>
  <div class="PackageContainer">
    <p class="title">{{title}}</p>
    <p class="price">{{price}}</p>
    <p class="description">{{description}}</p>
    <button v-if="button != 'Create'" @click="$emit('show-package-details')" class="subscribe">See Details</button>
    <a   v-else :href="buttonroute" class="subscribe" :class="button == 'Create' ? 'create' : ''">{{button}}</a>

  </div>
</template>

<script>
export default {
props:['title','price','description','button','buttonroute']
}
</script>

<style lang="scss">
$white: #FFFFFF;
$orange: #FDBD42;
$blue: #22AEE4;
$grey-text: #00000099;
$dark-grey-text: #000000CC;
$light-grey: #00000080;
$shadow-color: #0000001A;

.PackageContainer{
    background: $white;
    width: 233px;
    height: 300px;
    box-shadow: 0px 0px 3px $shadow-color;
    border-radius: 20px;
    margin: 20px 20px 20px 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 20px 0 0 0;
    position: relative;
    .title{
        font-size: 16px;
        
    }
    .price{
        margin-top: 23px;
        font-size: 36px;
        color: $grey-text;
    }
    .description{
        margin-top: 28px;
        color: $light-grey;
        font-size: 14px;
        text-align: center;
        padding: 0 10px;
    }
    .see-details{
        margin-top: 18px;
        font-size: 16px;
        margin-bottom: 20px;
        cursor: pointer;
    }
    .subscribe{
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        width: 148px;
        height: 31px;
        border-radius: 20px;
        background: $orange;
        font-size: 14px;
        color: $white;
        position: absolute;
        bottom: 18px;
        &.create{
            background: $blue;
        }

    }
}

</style>