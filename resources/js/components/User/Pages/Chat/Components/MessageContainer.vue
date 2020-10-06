<template>
  <div class="MessageContainer" :class="type">
    <img :src="profileimage" :title="username" class="image" v-if="showimage">
    <div class="message-data">
        <p class="message">{{message}}</p>
        <p class="time">{{time}}</p>
    </div>
</div>
</template>

<script>
export default {
    props:['type','username','profileimage','showimage','message','time']
}
</script>

<style lang="scss">
$white: #fff;
$orange: #FDBD4280;
$blue: #22AEE480;
$text-grey: #00000066;

.MessageContainer{
    width: fit-content;
    margin: 10px 20px;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
    .image{
        width: 50px;
        height: 50px;
    }
    .message-data{
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-end;
    .message{
    min-width: 300px;
    max-width: calc(100% - 50px);
    min-height: 60px;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 15px 20px;
    color: #444;
    overflow-x: auto;

    white-space: pre-line
    }
    
    .time{
      margin-top: 5px;
      font-size: 10px;
      color: $text-grey;
    }
    
  }

  &.sender{
      flex-direction: row-reverse;
      margin-left: auto;
      justify-content: flex-start;
      .image{
        margin-left: 20px;;
      }
      .message{
        border-radius: 25px 25px 5px 25px;
      background: $blue;
    }
    }
    &.reciever{
      flex-direction: row;
      margin-right: auto;
      justify-content: flex-start;
      .message-data{
        align-items: flex-start;
      }
      .image{
        margin-right: 20px;;
      }
      .message{
        border-radius: 25px 25px 25px 5px;
      background: $orange;
    }

    }
}
</style>