<template>
  <div class="SidebarItem">
    <img class="icon" :src=icon alt="">
    <img class="icon-active" :src=iconActive alt="">
    <p class="item-title">{{ title }}</p>
  </div>
</template>

<script>
export default {
props: ['title','icon', 'iconActive']
}
</script>

<style lang="scss">
.SidebarItem{
    min-width: 200px;
    display: grid;
    grid-template-columns: 80px auto;
    justify-content: flex-start;
    align-items: center;
    margin: 20px auto;
    height: 27px;
    position: relative;
    cursor: pointer;
    .icon{
        width: 27px;
        height: 27px;;
        margin-left: 30px;
        display: block;
    }
    .icon-active{
        width: 27px;
        height: 27px;;
        margin-left: 30px;
        display: none;
    }
    .item-title{
        font-size: 16px;
        color: #888;   
    }
    &.active{
        .item-title{                        
            color: #222 !important;
            }

        .icon{
        width: 27px;
        height: 27px;;
        margin-left: 30px;
        display: none !important;
        }
        .icon-active{
            width: 27px;
            height: 27px;;
            margin-left: 30px;
            display: block !important;
        }
        }
}
</style>