<template>
<div class="Sidebar">
  <img  :src=logo alt="" class="logo">

  <SidebarItem class="active" title="Home" icon='/images/icons/home-grey.svg' iconActive='/images/icons/home.svg'/>
  <SidebarItem title="Packages" icon='/images/icons/packages-grey.svg' iconActive='/images/icons/packages.svg'/>
  <SidebarItem title="Profile" icon='/images/icons/profile-grey.svg' iconActive='/images/icons/profile.svg'/>
  <SidebarItem title="Chat" icon='/images/icons/chat-grey.svg' iconActive='/images/icons/chat.svg'/>
  <SidebarItem title="Old Orders" icon='/images/icons/old-order-grey.svg' iconActive='/images/icons/old-order.svg'/>

  <SidebarItem class="logout" title="Logout" icon='/images/icons/logout.svg' iconActive='/images/icons/logout.svg'/>

</div>
</template>

<style lang="scss">
  .logo{
      margin: 20px auto;
  }
  .logout{
    margin-top: 100px;;
  }
</style>

<script>
import SidebarItem from './SidebarItem'
export default {
name: 'user-sidebar',
components:{
  SidebarItem
},
data() {
  return {
    logo: '/images/logo.png',
  }
  }
}
</script>

