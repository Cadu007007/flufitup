<template>
<div class="NotificationItem">
    <img :src="userimage" alt="" class="image">
    <img v-if="type=='new'" src="/images/admin/icons/notification-order.svg" alt="" class="icon">
    <img v-if="type=='modify'" src="/images/admin/icons/notification-edit.svg" alt="" class="icon">
    <img v-if="type=='cancel'" src="/images/admin/icons/notification-cancel.svg" alt="" class="icon">
    <div class="notification-info" :class="isopened ? 'read' : ''">
        <span class="new-dot"></span>
        <p class="username">{{username}}</p>
        <p class="text" v-if="type=='new'">Placed New Order</p>
        <p class="text" v-if="type=='modify'">Modified his order</p>
        <p class="text" v-if="type=='cancel'">Want to cancel his order</p>
        <p class="time">{{ time }}</p>
    </div>
</div>
</template>

<script>
export default {
    props: ['userimage','username','type','text','time','isopened']
}
</script>

<style lang="scss">
$white: #fff;
$dark-white:#E8ECF3;
$black: #222;
$grey: #00000080;
$blue: #22AEE4;

    .NotificationItem{
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
            position: relative;
            top: -10px;
            border-radius: 25px;
        }
        .notification-info{
            padding: 0 12px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            .new-dot{
                position: absolute;
                right: 15px;
                top: 10px;
                background: $blue;
                width: 8px;
                height: 8px;
                border-radius: 5px;
            }
            .username{
                font-size: 12px;
                font-family: 'Open-Sans-Semibold';
                color: $black;
                margin-bottom: 4px;
                text-overflow: ellipsis;
                width: 140px;
                white-space: nowrap;
                overflow: hidden;

            }
            .text{
                font-size: 10px;
                font-family: 'Open-Sans-Regular';
                color: $blue;

                text-overflow: ellipsis;
                width: 136px;
                white-space: nowrap;
                overflow: hidden;

            }
            .time{
                font-size: 10px;
                font-family: 'Open-Sans-Regular';
                color: $blue;
                margin-top: 10px;
            }


            &.read{
                .text{
                    color: $grey !important;
                }
                .new-dot{
                    display: none !important;
                }
            }
        }

        .icon{
            position: relative;
            right: 10px;
            top: 5px;
            width: 20px;
            height: 20px;
        }
    }
</style>