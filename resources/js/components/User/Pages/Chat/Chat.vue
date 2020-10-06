<template>
<div class="Chat">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>
  <div class="messages-wrapper">
    <div class="messages-container">
        <MessageContainer v-for="message in messages" :key="message.id"
        :type="message.type"
        :profileimage="message.profileimage"
        :showimage="message.showimage"
        :message="message.message"
        :time="message.time"
        :username="message.username"
        />
    </div>
  </div> <!-- End of Wrapper -->
    <div class="message-box">
      <textarea class="message-input" name="" @keydown.enter="handleEnter" autofocus placeholder="Write your message to us" id="chatMessageInput" v-model="typedmessage"></textarea>
      <img class="send-message" src="/images/icons/send-icon.svg" @click="sendNewMessage" title="Send" alt="">
    </div>
</div>
</template>
<script>
import MessageContainer from './Components/MessageContainer'
export default {
  data() {
    return {
      title: 'Chat',
      typedmessage: '',
      scroll: true,
      messages: [
        {id:1, type: 'sender',profileimage: '/images/logo.png', message: 'This is a message from the sender', time: '5 Min ago - 09/19/2020', username: 'Fluffit-up', showimage : true},
        {id:2, type: 'reciever',profileimage: this.user[0].image, message: 'This is a message from the reciever', time: '4 Min ago - 09/19/2020', username: this.user[0].name, showimage : this.user[0].show_image},
      ]
    }
  },
  props: {
    date: String,
    user: Array
  },
  components:{
    MessageContainer
  },
  methods: {
    sendNewMessage(){
      // check that input is not empty
      if (this.typedmessage.trim().length){
        this.messages.push({id:this.messages.length+1, type: 'sender',profileimage: '/images/logo.png', message: this.typedmessage, time: '5 Min ago - 09/19/2020', username: 'Fluffit-up', showimage : true},)
        this.typedmessage = ''
        var chatContainer = document.getElementsByClassName('messages-container')[0]
       
        // solution 1 .. scrolling with interval
        var scrollValue = 0
        var scrollInterval = setInterval(function(){
            chatContainer.scrollBy(0, 1000 )
        },1)



      jQuery(function($) {
          $('.messages-container').on('scroll', function() {
              if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                  // clear interval
                  clearInterval(scrollInterval);
              }
          })
      });
      }
      
    },
    handleEnter (e) {
    	if (e.ctrlKey) {
        this.sendNewMessage()
      }
    },
  },
}
</script>
<style lang="scss">
$white: #fff;
$page-header-height: 50px;
$orange: #FDBD4280;
$blue: #22AEE480;
$text-grey: #00000066;


.Chat{
  padding: 0 !important;
.page-header{
  margin: 0 140px 0 16px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  height: $page-header-height;
  .title{
  margin: 26px 0;
  font-size: 12px;
  font-weight: bold;
  }
      .date{
    font-size: 10px;
    color: $text-grey;
  }
}

/* Wrapper */
.messages-wrapper{
  position: relative;
  z-index: 1;
  height: 500px;
  overflow: auto;
  display: flex;
  flex-direction: column;
justify-content: flex-end;
}
/* chat messages container */
.messages-container{
width: 100%;
//height: calc(100% - #{$page-header-height});
display: flex;
flex-direction: column;
justify-content: flex-end;

position: relative;
overflow-y: auto;
overflow-x: hidden;
bottom: 0;

  
}
.message-box{
    width: calc(100% - 40px);
    margin: 5px auto 30px auto;
    position: relative;
    width: 90%;
    height: 50px;
    height: auto;
    bottom: 10px;

    .message-input{
      height: 40px;
      line-height: 1.75;
      background: $white;
      border-radius: 20px;
      width: 100%;
      padding: 10px 40px 0 30px;
      resize: none;
    }
    .send-message{
      position: absolute;
      bottom: 11px;
      right: 20px;
      cursor: pointer;
    }
 
  }

}
</style>

