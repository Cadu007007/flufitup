<template>
  <div class="ChatPopupList">
    <div class="header">
        <div class="title">Chat</div>
        <a :href="viewallroute" class="link">View All</a>
    </div>

    <ChatNotificationItem
        v-for="(item,index) in chatsnotifications" :key="item.id"
        class="chat-item"
        :userimage="item.userimage"
        :username="item.username"
        :message="item.message"
        :time="item.time"
        :isread="item.isread"
    />    
    
  </div>
</template>

<script>
import ChatNotificationItem from './ChatNotificationItem'
export default {
    props: ['chatsnotifications','viewallroute'],
components:{
    ChatNotificationItem
}
}
</script>

<style lang="scss">
$white: #fff;
$black: #222;
$grey: #00000080;
$blue: #22AEE4;

.ChatPopupList{
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

    .chat-item{
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