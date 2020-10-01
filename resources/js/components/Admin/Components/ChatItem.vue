<template>
<div class="ChatItem">
    <img :src="userimage" alt="" class="image">
    <div class="chat-info" :class="isread ? 'read' : ''">
        <span class="new-dot"></span>
        <p class="username">{{username}}</p>
        <p class="message">{{ message }}</p>
        <p class="time">{{ time }}</p>
    </div>
</div>
</template>

<script>
export default {
    props: ['userimage','username','message','time','isread']
}
</script>

<style lang="scss">
$white: #fff;
$dark-white:#E8ECF3;
$black: #222;
$grey: #00000080;
$blue: #22AEE4;

    .ChatItem{
        margin-top: 15px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        position: relative;
        padding: 5px 16px;

        &:hover{
            background: $dark-white;
        }
        .image{
            width: 50px;
            height: 50px;
            border-radius: 25px;
            position: relative;
            top: 1px;
        }
        .chat-info{
            padding: 0 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            .new-dot{
                position: absolute;
                right: 15px;
                top: 15px;
                background: $blue;
                width: 8px;
                height: 8px;
                border-radius: 5px;
            }
            .username{
                font-size: 12px;
                font-family: 'Open-Sans-Semibold';
                color: $black;
                margin-bottom: 6px;

                text-overflow: ellipsis;
                width: 140px;
                white-space: nowrap;
                overflow: hidden;

            }
            .message{
                font-size: 10px;
                font-family: 'Open-Sans-Regular';
                color: $blue;

                text-overflow: ellipsis;
                width: 136px;
                white-space: nowrap;
                overflow: hidden;

            }
            .time{
                position: absolute;
                right: 24px;
                bottom: 11px;
                font-size: 10px;
                font-family: 'Open-Sans-Regular';
                color: $grey;

            }


            &.read{
                .message{
                    color: $grey !important;
                }
                .new-dot{
                    display: none !important;
                }
            }
        }
    }
</style>