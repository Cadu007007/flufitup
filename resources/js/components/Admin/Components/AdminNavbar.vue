<template>
  <div class="AdminNavbar">
    <div class="left">
    </div>
    <div class="center">
        <div class="searchbox">
            <input type="text" class="search" placeholder="Search" />
            <img class="icon" src='/images/admin/icons/search.svg' alt="">
        </div>
    </div>
    <div class="right">
        <div class="chat" @click="changeChatState">
            <img src="/images/admin/icons/chat.svg" alt="" class="navbar-icon">
            <span class="count">{{chatcount}}</span>
        </div>
        <div class="notifications" @click="changeNotificationsState">
            <img src="/images/admin/icons/notification.svg" alt="" class="navbar-icon">
            <span class="count">{{notificationscount}}</span>
        </div>
        <div class="profile">
            <img src="/images/icons/profile.svg" alt="" class="profile-image">
            <img src="/images/icons/arrow-.svg" alt="" class="icon">
        </div>
    </div>

    <Chat-Popup-List
        v-show="getChatPopupState"
        :chatsnotifications="chatsnotifications"
        :viewallroute="viewallchatroute"
    />
    
    <Notifications-Popup-List
        v-show="getNotificationsPopupState"
        :notifications="notifications"
        :viewallroute="viewallnotificationsroute"
    />
    
  </div>
</template>

<script>
import ChatPopupList from './ChatPopupList'
import NotificationsPopupList from './NotificationsPopupList'

export default {
    props: ['chatcount','notificationscount','chatsnotifications','notifications','viewallchatroute','viewallnotificationsroute',],
    components: {
        ChatPopupList,
        NotificationsPopupList
    },
    computed: {
        getChatPopupState(){ 
            return this.$store.getters.getChatPopupState
        },
        getNotificationsPopupState(){ 
            return this.$store.getters.getNotificationsPopupState
        }
      },
      methods: {
          changeChatState(){
            this.$store.dispatch("changeChatPopupState")
          },
          changeNotificationsState(){
            this.$store.dispatch("changeNotificationsPopupState")
          }
      },

}
</script>

<style lang="scss">
$dark-white: #F9F9F9;
$red: #FD5252;

@mixin flex-row-center{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.AdminNavbar{
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 0 120px;;
    .left{

    }
    .center{
        .searchbox{
            width: 536px;
            position: relative;
            .search{
                width: 100%;
                height: 40px;
                border-radius: 10px;
                border: 1px solid #EBEBEB;
                background: $dark-white;
                padding: 9px 24px;
                font-size: 18px;
                font-family: 'Lato-Bold';
            }
            .icon{
                position: absolute;
                right: 24px;
                top: 10px;
            }

        }
    }
    .right{

        @include flex-row-center;
        margin: 0 20px;
        .chat, .notifications {
            position: relative;
            .count{
                background: $red;
                color: #fff;
                font-size: 10px;
                border-radius: 10px;
                min-width: 15px;
                height: 15px;
                padding: 0 5px;
                text-align: center;
                position: absolute;
                top: 0;
                right: -2px;
            }
        }
        .navbar-icon{
            height: 16px;
            width: 16px;
            margin: 10px 8px 0 8px;
        }
        .profile-image{
            width: 32px;
            height: 32px;
            margin: 0 10px 0 20px;
        }
    }

}
</style>