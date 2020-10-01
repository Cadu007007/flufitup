<template>
  <div class="AdminSidebar">
    <p class="title">MENU</p>

  <AdminSidebarItem :class=" active == 'dashboard' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetodashboard
  title="Dashboard"
  itemtooltip="Dashboard"
  icon='/images/admin/icons/dashboard.svg' 
  iconActive='/images/admin/icons/dashboard-active.svg'/>


  <AdminSidebarItem :class=" active == 'reports' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetoreports
  title="Reports"
  itemtooltip="Reports"
  icon='/images/admin/icons/reports.svg' 
  iconActive='/images/admin/icons/reports-active.svg'/>

  <AdminSidebarItem :class=" active == 'packages' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetopackages
  title="Packages"
  itemtooltip="Packages"
  icon='/images/admin/icons/packages.svg' 
  iconActive='/images/admin/icons/packages-active.svg'/>


  <AdminSidebarItem :class=" active == 'users' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetousers
  title="Users"
  itemtooltip="Users"
  icon='/images/admin/icons/users.svg' 
  iconActive='/images/admin/icons/users-active.svg'/>
    

  <AdminSidebarItem :class=" active == 'admins' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetoadmins
  title="Admins"
  itemtooltip="Admins"
  icon='/images/admin/icons/admins.svg' 
  iconActive='/images/admin/icons/admins-active.svg'/>
    
  </div>
</template>

<script>
import AdminSidebarItem from './AdminSidebarItem'

export default {
    props:['active','routetodashboard','routetoreports','routetopackages','routetousers','routetoadmins'],
    components:{
        AdminSidebarItem
    }

}
</script>

<style lang="scss">
$blue: #687CA4;
.AdminSidebar{
    .title{
        font-size: 9px;
        font-family: 'Open-Sans-Semibold';
        color: $blue;
        margin: 24px 36px;
    }

    .AdminSidebarItem{
        margin-bottom: 34px;
    }
}
</style>