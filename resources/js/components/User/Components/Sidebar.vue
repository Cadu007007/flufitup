<template>
<div class="Sidebar">
  <img  :src=logo alt="" class="logo">
<!-- 
  <img src="/images/icons/arrow-left.svg" alt="" class="collapse-sidebar">
  <img src="/images/icons/arrow-right.svg" alt="" class="expand-sidebar hidden"> -->
<div class="items">
  <SidebarItem :class=" active == 'home' ? 'active' : '' " 
  class="HomeSidebarItem" 
  :href=routetohome
  title="Home"
  itemtooltip="Home"
  icon='/images/icons/home-grey.svg' 
  iconActive='/images/icons/home.svg'/>

  <SidebarItem :class=" active == 'packages' ? 'active' : '' " 
  class="PackagesSidebarItem"
  :href=routetopackages
  title="Packages"
  itemtooltip="Packages"
  icon='/images/icons/packages-grey.svg' 
  iconActive='/images/icons/packages.svg'/>
  
  <SidebarItem :class=" active == 'profile' ? 'active' : '' " 
  class="ProfileSidebarItem" 
  :href=routetoprofile
  title="Profile" 
  itemtooltip="Profile"
  icon='/images/icons/profile-grey.svg' 
  iconActive='/images/icons/profile.svg'/>
  
  <SidebarItem :class=" active == 'chat' ? 'active' : '' "
   class="ChatSidebarItem" 
   :href=routetochat
   title="Chat"
  itemtooltip="Chat"
   icon='/images/icons/chat-grey.svg'
   iconActive='/images/icons/chat.svg'/>
  
  <SidebarItem :class=" active == 'old_orders' ? 'active' : '' " 
  class="OldOrdersSidebarItem" 
  :href=routetooldorders
  title="Previous Orders" 
  itemtooltip="Previous Orders"
  icon='/images/icons/old-order-grey.svg' 
  iconActive='/images/icons/old-order.svg'/>

</div>
<!-- 
  <SidebarItem class="logout" 
  title="Logout"
  itemtooltip="Logout"
  :href=routetologout
  icon='/images/icons/logout.svg' 
  iconActive='/images/icons/logout.svg'/> -->
<form :action="routetologout" method="post">
  <input type="hidden" name="_token" :value="csrf">
<button class="SidebarItem logout border-0 bg-transparent" title="Logout">
    <img class="icon" src="/images/icons/logout.svg" alt="">
    <img class="icon-active" src="/images/icons/logout.svg" alt="">
    <p class="sidebar-item-title">Logout</p>
    <span class="active-column"></span>
  </button>
</form>
  

</div>
</template>

<style lang="scss">

$logo-height: 75px;
$logo-margins: 20px;
$logout-height: 27px;
$logout-margins: 136px;
$items-top-margin: 60px;
  .Sidebar{
      position: relative;
    .logo{
        margin: 20px auto;
        width: 67px;
        height: $logo-height;
    }
    .collapse-sidebar, .expand-sidebar{
      width: 50px;
      height: 50px;
      position: absolute;
      right: -25px;
      top: 155px;
      z-index: 6;
      opacity: 0;
    }
    .items{
        margin-top: $items-top-margin;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      align-items: center;
      height: calc( 100vh - #{$logo-height} - #{$logo-margins} - #{$logout-height} - #{$logo-margins} - #{$items-top-margin} );
    }
    .logout{
      margin-top: 88px;
      margin-bottom: 48px;
    }
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
    csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
    }
  },
}
</script>

