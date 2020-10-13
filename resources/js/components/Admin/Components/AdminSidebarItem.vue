<template>
  <a class="AdminSidebarItem" :title="itemtooltip">
    <img class="icon" :src=icon alt="">
    <img class="icon-active" :src=iconActive alt="">
    <p class="item-title">{{ title }}</p>
    <div class="active-dot"></div>
  </a>
</template>

<script>
export default {
props: ['title','icon', 'iconActive','itemtooltip']
}
</script>

<style lang="scss">
$navy: #031949;
$blue: #22AEE4;
$black: #111;

.AdminSidebarItem{
    width: 100%;
    display: grid;
    grid-template-columns: 75px auto;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    cursor: pointer;
    .icon{
        width: 16px;
        height: 16px;
        margin-left: 40px;
        display: block;
    }
    .icon-active{
        width: 16px;
        height: 16px;
        margin-left: 40px;
        display: none;
    }
    .item-title{
        font-size: 12px;
        font-family: 'Open-Sans-Semibold';
        color: $black;      
        margin-top: 1px;
    }

    .active-dot{
            position: relative;
            top: -10px;
            left: 25px;
            width: 5px;
            height: 5px;
            border-radius: 5px;
            background: $blue;
            display: none;
            
        }

    &.active{
        
        .item-title{                        
            color: $navy !important;
        }
        .icon{
        display: none !important;
        }
        .icon-active{
            display: block !important;
        }

        .active-dot{
            display: block !important;
        }
        }
}
</style>