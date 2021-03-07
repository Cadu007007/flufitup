<template>
<div class="Profile">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="lastlogin">{{lastlogin}}</p>
  </div>

  <ProfileCard :profileimage="profileimage" 
      :name=name
      :email="email"
      :emailstatus="emailstatus"
      :phone="phone"
      :phonestatus="phonestatus"
      :address="address"
      :birthday="birthday"
      :editprofileroute="editprofileroute"
      :changepasswordroute="changepasswordroute"
  />

  <WalletCard
  :value="walletvalue"
  :currency="walletcurrency"
   />

</div>


</template>


<script>
import ProfileCard from './Components/ProfileCard'
import WalletCard from './Components/WalletCard'

export default {
  data() {
    return {
      title: 'Profile'
    }
  },
  props: ['lastlogin','profileimage','name','email','emailstatus','phone','phonestatus','address','birthday',
            'editprofileroute',
            'changepasswordroute',
            'walletvalue',
            'walletcurrency'],
  components: {
    ProfileCard,
    WalletCard
  }
  

}
</script>
<style lang="scss">
$text-grey: #00000066;


.Profile{
  padding: 0 140px 0 16px;
.page-header{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  .title{
  margin: 26px 0;
  font-size: 12px;
  font-weight: bold;
  }
    .lastlogin{
    font-size: 10px;
    color: $text-grey;
  }

}

}
</style>

