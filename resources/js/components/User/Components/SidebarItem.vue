<template>
  <a class="SidebarItem" :title="itemtooltip">
    <img class="icon" :src=icon alt="">
    <img class="icon-active" :src=iconActive alt="">
    <p class="item-title">{{ title }}</p>
    <span class="active-column"></span>
  </a>
</template>

<script>
export default {
props: ['title','icon', 'iconActive','itemtooltip']
}
</script>

<style lang="scss">
.SidebarItem{
    width: 100%;
    display: grid;
    grid-template-columns: 70px auto;
    justify-content: flex-start;
    align-items: center;
/*     margin: 10px auto;
    height: 27px;
 */    position: relative;
    cursor: pointer;
    .icon{
        width: 27px;
        height: 27px;;
        margin-left: 40px;
        display: block;
    }
    .icon-active{
        width: 27px;
        height: 27px;;
        margin-left: 40px;
        display: none;
    }
    .item-title{
        font-size: 16px;
        color: #888;   
        margin-left: 20px;;
    }
    &.active{
        .item-title{                        
            color: #222 !important;
        }
        .active-column{
            position: absolute;
            width: 3px;
            height: 27px;
            display: block !important;
            background: #22AEE4 0% 0% no-repeat padding-box;
            right: 0;
            top: 0;
        }
        .icon{
        width: 27px;
        height: 27px;;
        margin-left: 40px;
        display: none !important;
        }
        .icon-active{
            width: 27px;
            height: 27px;;
            margin-left: 40px;
            display: block !important;
        }
        }
        .active-column{
            display: none;
        }
}
</style>