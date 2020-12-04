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

<!--
  <AdminSidebarItem :class=" active == 'packages' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetopackages
  title="Packages"
  itemtooltip="Packages"
  icon='/images/admin/icons/packages.svg' 
  iconActive='/images/admin/icons/packages-active.svg'/>

-->

<AdminSidebarPackagesMenu
class="AdminSidebarItem" 
:class="(active == 'dry_clean' || active == 'household_items' || active == 'detergents') ? 'menu-title-active' : '' "
:active="active"
:routetopackages= "routetopackages"
icon='/images/admin/icons/packages.svg' 
iconActive='/images/admin/icons/packages-active.svg'
:routetodryclean="routetodryclean"
:routetohouseholditems="routetohouseholditems"
:routetodetergents="routetodetergents"
/>


  <AdminSidebarItem :class=" active == 'users' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetousers
  title="Users"
  itemtooltip="Users"
  icon='/images/admin/icons/users.svg' 
  iconActive='/images/admin/icons/users-active.svg'/>
    

<AdminSidebarPlannerMenu
class="AdminSidebarItem" 
:class="(active == 'pickup_planner' || active == 'delievery_planner') ? 'menu-active' : '' "
:active="active"
icon='/images/admin/icons/planner-icon.svg' 
iconActive='/images/admin/icons/planner-icon-active.svg'
:routetopickupplanner="routetopickupplanner"
:routetopickdelieveryplanner="routetopickdelieveryplanner"
/>

<AdminSidebarEmployeesMenu
class="AdminSidebarItem" 
:class="(active == 'admins' || active == 'drivers' || active == 'laundery_staff') ? 'menu-active' : '' "
:active="active"
icon='/images/admin/icons/employees-icon.svg' 
iconActive='/images/admin/icons/employees-icon-active.svg'
:routetoadmins="routetoadmins"
:routetodrivers="routetodrivers"
:routetolaunderystaff="routetolaunderystaff"
/>

  <AdminSidebarItem :class=" active == 'promocodes' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetopromocodes
  title="Promocodes"
  itemtooltip="Promocodes"
  icon='/images/admin/icons/promocodes-icon.svg' 
  iconActive='/images/admin/icons/promocodes-icon-active.svg'/>
   

  <AdminSidebarItem :class=" active == 'zones' ? 'active' : '' " 
  class="AdminSidebarItem" 
  :href=routetozones
  title="Zones"
  itemtooltip="Zones"
  icon='/images/admin/icons/zones-icon.svg' 
  iconActive='/images/admin/icons/zones-icon-active.svg'/>
   


  </div>
</template>

<script>
import AdminSidebarItem from './AdminSidebarItem'
import AdminSidebarPlannerMenu from './AdminSidebarPlannerMenu'
import AdminSidebarEmployeesMenu from './AdminSidebarEmployeesMenu'
import AdminSidebarPackagesMenu from './AdminSidebarPackagesMenu'

export default {
    props:['active','routetodashboard','routetoreports',
            'routetopackages','routetodryclean','routetohouseholditems','routetodetergents',
            'routetousers','routetoadmins',
            'routetopickupplanner','routetopickdelieveryplanner',
            'routetoadmins','routetodrivers','routetolaunderystaff',
            'routetopromocodes','routetozones'
            ],
    components:{
        AdminSidebarItem,
        AdminSidebarPlannerMenu,
        AdminSidebarEmployeesMenu,
        AdminSidebarPackagesMenu
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
        margin-bottom: 20px;
    }
}
</style>