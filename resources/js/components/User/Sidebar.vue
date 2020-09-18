<template>
<div class="Sidebar">
  <img  :src=logo alt="" class="logo">

  <SidebarItem :class=" active == 'home' ? 'active' : '' " 
  class="HomeSidebarItem" 
  :href=routetohome
  title="Home"
  icon='/images/icons/home-grey.svg' 
  iconActive='/images/icons/home.svg'/>

  <SidebarItem :class=" active == 'packages' ? 'active' : '' " 
  class="PackagesSidebarItem"
  :href=routetopackages
  title="Packages"
  icon='/images/icons/packages-grey.svg' 
  iconActive='/images/icons/packages.svg'/>
  
  <SidebarItem :class=" active == 'profile' ? 'active' : '' " 
  class="ProfileSidebarItem" 
  :href=routetoprofile
  title="Profile" 
  icon='/images/icons/profile-grey.svg' 
  iconActive='/images/icons/profile.svg'/>
  
  <SidebarItem :class=" active == 'chat' ? 'active' : '' "
   class="ChatSidebarItem" 
   :href=routetochat
   title="Chat" 
   icon='/images/icons/chat-grey.svg'
   iconActive='/images/icons/chat.svg'/>
  
  <SidebarItem :class=" active == 'old_orders' ? 'active' : '' " 
  class="OldOrdersSidebarItem" 
  :href=routetooldorders
  title="Old Orders" 
  icon='/images/icons/old-order-grey.svg' 
  iconActive='/images/icons/old-order.svg'/>

  <SidebarItem class="logout" 
  title="Logout"
  :href=routetologout
  icon='/images/icons/logout.svg' 
  iconActive='/images/icons/logout.svg'/>

</div>
</template>

<style lang="scss">
  .logo{
      margin: 20px auto;
      width: 67px;
      height: 75px;
  }
  .HomeSidebarItem{
    margin: 100px auto 20px auto ;
  }
  .logout{
    margin-top: 108px;
    margin-bottom: 48px;;
  }
</style>

<script>
import SidebarItem from './SidebarItem'
export default {
name: 'Sidebar',
components:{
  SidebarItem
},
  props:['active','routetohome','routetopackages','routetoprofile','routetochat','routetooldorders','routetologout'],

data() {
  return {
    logo: '/images/logo.png',
    }
  },
}
</script>

