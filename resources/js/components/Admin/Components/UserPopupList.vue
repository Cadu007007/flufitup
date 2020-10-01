<template>
  <div class="UserPopupList">
    <div class="header">
        <img :src="userimage" alt="" class="image">
        <div class="text-container">
            <p class="title">{{ username }}</p>
            <a :href="showprofileroute" class="subtitle">see your profile</a>
        </div>
    </div>
    <div class="list">
        <div class="list-item">
            <img src="/images/admin/icons/settings.svg" alt="" class="icon">
            <a :href="settingsroute" class="title">Settings</a>
        </div>
        <div class="list-item">
            <img src="/images/admin/icons/logout.svg" alt="" class="icon">
            <a :href="logoutroute" class="title">Logout</a>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ['userimage','username','showprofileroute','settingsroute','logoutroute'],

}
</script>

<style lang="scss">
$white: #fff;
$black: #222;
$grey: #00000080;
$blue: #22AEE4;

.UserPopupList{

    position: absolute;
    top: 50px;
    right: 190px;
    z-index: 2;
    background: $white;
    width: 200px;
height: 157px;
box-shadow: 0px 0px 5px #0000001A;
border: 1px solid #E8ECF3;
border-radius: 10px;
.header{
    padding: 12px;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
    height: 75px;
    border-bottom: 1px solid #0000001A;
    .image{
        width: 50px;
        height: 50px;
        border-radius: 25px;
    }
    .text-container{
        margin-left: 12px;    
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        .title{
            font-family: 'Open-Sans-Semibold';
            font-size: 12px;
            color: $black;
        }
        .subtitle{
            font-family: 'Open-Sans-Regular';
            font-size: 10px;
            color: $grey;
            margin-top: 5px;
        }
    }
}
        .list{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        .list-item{
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin: 10px 8px;
            padding: 0 16px;
        .icon{
            width: 16px;
            height: 16px;
        }
        .title{
            margin-left: 24px;
            font-family: 'Open-Sans-Semibold';
            font-size: 12px;
            color: $black;
        }
        }
}
}
</style>