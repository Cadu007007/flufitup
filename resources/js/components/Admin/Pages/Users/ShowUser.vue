<template>
  <div class="ShowUser">
  <div class="left">
    <img src="/images/icons/profile.svg" alt="" class="userimage">
    <p class="username">{{ user[0].name }} </p>
  </div>  

  <div class="right">
    <div class="info-container">
        <img src="/images/admin/icons/profile-email.svg" alt="" class="icon">
        <p class="value">{{user[0].email}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-phone.svg" alt="" class="icon">
        <p class="value">{{user[0].phone}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-calendar.svg" alt="" class="icon">
        <p class="value">{{user[0].birthday}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-location.svg" alt="" class="icon">
        <p class="value">Pickup Location</p>
    </div>
    <div class="seperator"></div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-package.svg" alt="" class="icon">
        <p class="value">{{user[0].package ? user[0].package : 'No Package Subscribed'}}</p>
    </div>
    <div class="info-container">
        <img src="/images/admin/icons/profile-wallet.svg" alt="" class="icon">
        <p class="value green" :class="user[0].wallet < 0 ? 'red' : ''">{{user[0].wallet}} {{user[0].currency}}</p>
        <p class="edit-wallet" @click="modalstate= !modalstate">Edit Wallet</p>
    </div>

    <Wallet-Modal 
    v-show="modalstate"
    @hide-modal="hidemodal"
    />
  </div>  
  </div>
</template>

<script>
import WalletModal from './Components/WalletModal'
export default {
    data() {
        return {
            modalstate: false
        }
    },
    props: {
        user: Array ,
        editwalletroute : String
    },
    components:{
        WalletModal
    },
    methods: {
        hidemodal(){
            this.modalstate = false
        }
    },
}
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey:#EEF2F4;
$blue: #22AEE4;
$black: #000;
$green: #00C319;
$red: red;

.ShowUser{
    width: 100%;
    height: 100%;
    display: grid;
    grid-template-columns: 300px 1fr;
    justify-content: flex-start;
    align-content: flex-start;
    .left{
        .userimage{
            width: 140px;
            height: 140px;
            border-radius: 70px;
            margin-top: 24px;
        }
        .username{
            font-family: 'Open-Sans-Bold';
            font-size: 21px;
            color: $black;
            margin-top: 16px;

        }
    }
    .right{
        .info-container{
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin-top: 40px;
            .icon{
                width: 30px;
                height: 30px;
                margin-right: 24px;
            }
            .value{
                font-family: 'Open-Sans-Semibold';
                font-size: 18px;
                color: $black;
                &.green{
                color: $green;
                }
                &.red{
                color: $red !important;
                }
            }
            .edit-wallet{
                margin-left: 66px;
                font-size: 14px;
                color: $blue;
                cursor: pointer;
            }
        }
        .seperator{
            width: 444px;
            height: 1px;
            background: $blue;
            margin: 39px 0;
        }
    }
    
}
</style>