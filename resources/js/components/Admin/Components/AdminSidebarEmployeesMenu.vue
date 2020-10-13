<template>
  <div class="AdminSidebarEmployeesMenu" title="Employees" @click="showMenuItems">
    <img class="menu-icon" :src=icon alt="">
    <img class="menu-icon-active" :src=iconActive alt="">
    <p class="item-title">{{ title }}<img class="menu-arrow" src="/images/admin/icons/menu-arrow-icon.svg"></p>
    
    <div class="menu-active-dot" v-if="!showitems"></div>
        <div class="menu-items" v-show="showitems">

            <AdminSidebarItem :class="active == 'admins' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetoadmins
            title="Admins"
            itemtooltip="Admins"  
            icon='/images/admin/icons/admins-icon.svg' 
            iconActive='/images/admin/icons/admins-icon-active.svg'
            />

            <AdminSidebarItem :class="active == 'drivers' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetodrivers
            title="Drivers"
            itemtooltip="Drivers"  
            icon='/images/admin/icons/drivers-icon.svg' 
            iconActive='/images/admin/icons/drivers-icon-active.svg'
            />

            <AdminSidebarItem :class=" active == 'laundery_stuff' ? 'active' : '' " 
            class="AdminSidebarSubItem" 
            :href=routetolaunderystuff
            title="Laundery Stuff"
            itemtooltip="Laundery Stuff"
            icon='/images/admin/icons/laundery-stuff-icon.svg' 
            iconActive='/images/admin/icons/laundery-stuff-icon-active.svg'
            />

        </div>
  </div>
</template>

<script>
import AdminSidebarItem from './AdminSidebarItem'
export default {
    mounted() {
        if(this.active == 'admins' || this.active == 'drivers' || this.active == 'laundery_stuff'){
            this.showitems = true
        }
    },
    data() {
        return {
            title: 'Employees',
            showitems: false
        }
    },
props: ['icon', 'iconActive','active',
        'routetoadmins','routetodrivers','routetolaunderystuff'
        ],
        components:{
            AdminSidebarItem
        },
        methods: {
            showMenuItems(){
                this.showitems = !this.showitems
            }
        },
}
</script>

<style lang="scss">
$navy: #031949;
$blue: #22AEE4;
$black: #111;

.AdminSidebarEmployeesMenu{
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