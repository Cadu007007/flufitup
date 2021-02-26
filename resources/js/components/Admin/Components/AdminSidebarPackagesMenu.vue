<template>
<div class="AdminSidebarPackagesMenu" :class="active == 'packages' ? 'menu-title-active' : ''" title="Packages">
    <img class="menu-icon" :src=icon alt=""  @click="showMenuItems">
    <img class="menu-icon-active" :src=iconActive alt=""  @click="showMenuItems">
    <p class="item-title menu-title"  @click="showMenuItems">{{ title }}<img class="menu-arrow" src="/images/admin/icons/menu-arrow-icon.svg"></p>
    
    <div class="menu-active-dot" v-if="!showitems"></div>
        <div class="menu-items" v-show="showitems">
            <AdminSidebarItem :class="active == 'dry_clean' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetodryclean
            title="Dry Clean"
            itemtooltip="Dry Clean"  
            icon='/images/admin/icons/dry-clean.svg' 
            iconActive='/images/admin/icons/dry-clean-active.svg'
            />
            <AdminSidebarItem :class="active == 'household_items' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetohouseholditems
            title="Household Items"
            itemtooltip="Household Items"  
            icon='/images/admin/icons/household.svg' 
            iconActive='/images/admin/icons/household-active.svg'
            />

            <AdminSidebarItem :class=" active == 'detergents' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetodetergents
            title="Detergents"
            itemtooltip="Detergents"
            icon='/images/admin/icons/detergents.svg' 
            iconActive='/images/admin/icons/detergents-active.svg'
            />
            <!-- Fabric, Dryer & Scent -->
            <AdminSidebarItem :class=" active == 'fabric' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetofabricsoftener
            title="Fabric Softener"
            itemtooltip="Fabric Softener"
            icon='/images/admin/icons/detergents.svg' 
            iconActive='/images/admin/icons/detergents-active.svg'
            />
            <AdminSidebarItem :class=" active == 'dryer' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetodryersheets
            title="Dryer Sheets"
            itemtooltip="Dryer Sheet"
            icon='/images/admin/icons/detergents.svg' 
            iconActive='/images/admin/icons/detergents-active.svg'
            />
            <AdminSidebarItem :class=" active == 'scent' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetoscentbooster
            title="Scent Booster"
            itemtooltip="Scent Booster"
            icon='/images/admin/icons/detergents.svg' 
            iconActive='/images/admin/icons/detergents-active.svg'
            />

        </div>
  </div>
</template>

<script>
import AdminSidebarItem from './AdminSidebarItem'
export default {
    mounted() {
        if(this.active == 'packages' || this.active == 'dry_clean'
          || this.active == 'household_items' || this.active == 'detergents'
          || this.active == 'fabric' || this.active == 'dryer' || this.active == 'scent' 
         ){
            this.showitems = true
            // show packages active icon
        }
    },
    data() {
        return {
            title: 'Packages',
            showitems: false
        }
    },
props: ['icon', 'iconActive','active',
        'routetopackages',
        'routetodryclean','routetohouseholditems','routetodetergents',
        'routetofabricsoftener', 'routetodryersheets','routetoscentbooster',
        ],
        components:{
            AdminSidebarItem
        },
        methods: {
            showMenuItems(){
                window.location.href= this.routetopackages
                this.showitems = !this.showitems
            }
        },
}
</script>

<style lang="scss">
$navy: #031949;
$blue: #22AEE4;
$black: #111;

.AdminSidebarPackagesMenu{
    width: 100%;
    display: grid;
    grid-template-columns: 75px auto;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    cursor: pointer;
    .menu-icon{
        width: 16px;
        height: 16px;
        margin-left: 40px;
        display: block;
    }
    .menu-icon-active{
        width: 16px;
        height: 16px;
        margin-left: 40px;
        display: none;
    }
    .item-title{
        font-size: 12px;
        font-family: 'Open-Sans-Semibold';
        color: $black;      
        margin-top: 1px;
    }

    .menu-arrow{
        position: relative;
        left: 20px;
        bottom: 2px;
    }

    .menu-active-dot{
            position: relative;
            top: -12px;
            left: 25px;
            width: 5px;
            height: 5px;
            border-radius: 5px;
            background: $blue;
            display: none;
            
        }


    .item-active-dot{
            position: relative;
            top: -10px;
            left: 25px;
            width: 5px;
            height: 5px;
            border-radius: 5px;
            background: $blue;
            display: none;
            
        }

    &.menu-active{
        
        .item-title{                        
            color: $navy !important;
        }
        .menu-icon{
        display: none !important;
        }
        .menu-icon-active{
            display: block !important;
        }

        .menu-items{
                    width: 200px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-evenly;
                    align-items: flex-start;
                    padding: 10px 0;
                    margin-left: 15px;
        }
        .menu-active-dot{
            display: block !important;
        }

        }

        &.menu-title-active{
            .menu-title{
                color: $navy !important;
            }
        }

        .menu-items{
            width: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: flex-start;
            padding: 10px 0;
            margin-left: 10px;
            .AdminSidebarSubItem{
                margin: 15px 20px !important;
                margin-bottom: 0px !important;
                .icon{
                    display: block ;
                    }
                .icon-active{
                    display: none;
                }
                &.active{
                    
                    .item-title{                        
                        color: $navy !important;
                    }
                    .icon{
                    display: none !important;
                    }
                    .icon-active{
                        display: block !important;
                    }

                    .active-dot{
                        display: block !important;
                    }
                    }
            }
        }
}
</style>