<template>
  <div class="NotificationsPopupList">
    <div class="header">
        <div class="title">Notifications</div>
        <a :href="viewallroute" class="link">View All</a>
    </div>

    <NotificationItem
        v-for="(item,index) in notifications" :key="item.id"
        class="notification-item"
        :type="item.type"
        :userimage="item.userimage"
        :username="item.username"
        :message="item.message"
        :time="item.time"
        :isopened="item.isopened"
    />    
    
  </div>
</template>

<script>
import NotificationItem from './NotificationItem'
export default {
    props: ['notifications','viewallroute'],
components:{
    NotificationItem
}
}
</script>

<style lang="scss">
$white: #fff;
$black: #222;
$grey: #00000080;
$blue: #22AEE4;

.NotificationsPopupList{
    position: absolute;
    top: 50px;
    right: 190px;
    z-index: 2;
    background: $white;
    width: 260px;
    min-height: 100px;
    max-height: 700px;
    overflow-y: auto;
    box-shadow: 0px 0px 5px #0000001A;
    border-radius: 10px;
    padding: 16px 0;
    .header{
        height: 28px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 16px;
        .title{
            font-size: 21px;
            font-family: 'Open-Sans-Bold';
            color: $black;
        }
        .link{
            font-size: 12px;
            font-family: 'Open-Sans-Regular';
            color: $grey;
            cursor: pointer;
        }
    }

    .notification-item{
        margin-top: 15px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        position: relative;
        padding: 5px 16px;
    }

}
</style>