require('./bootstrap');

window.Vue = require('vue');

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
Vue.use(VueCarousel);

import axios from 'axios'

import storeData from "./store/index"

const store = new Vuex.Store(
        storeData
    )
    /* import jQuery */
import $ from 'jquery'

import VueCarousel from 'vue-carousel';
/* Landing page components */
var LandingPage = require('./components/LandingPage.vue').default

/* user components */
var Sidebar = require('./components/User/Components/Sidebar.vue').default

/* user pages */
var Home = require('./components/User/Pages/Home/Home.vue').default
var EditOrder = require('./components/User/Pages/Home/EditOrder.vue').default

/* Packages */
var Packages = require('./components/User/Pages/Packages/Packages.vue').default
var PackageSummary = require('./components/User/Pages/Packages/PackageSummary.vue').default
var PackageCreate = require('./components/User/Pages/Packages/PackageCreate.vue').default
var OnlinePayment = require('./components/User/Pages/Packages/OnlinePayment.vue').default
var PackageOrderSummary = require('./components/User/Pages/Packages/PackageOrderSummary.vue').default
var Categories = require('./components/User/Pages/Packages/Categories.vue').default

/* XX Packages XX */

/* Profile  */
var Profile = require('./components/User/Pages/Profile/Profile.vue').default
var ProfileChangePassword = require('./components/User/Pages/Profile/ProfileChangePassword.vue').default
var ProfileEdit = require('./components/User/Pages/Profile/ProfileEdit.vue').default
    /* XX Profile XX  */
    /* Old Orders */
var OldOrders = require('./components/User/Pages/OldOrders/OldOrders.vue').default
var OldOrderDetails = require('./components/User/Pages/OldOrders/OldOrderDetails.vue').default
    /* XX Old Orders XX */
var Chat = require('./components/User/Pages/Chat/Chat.vue').default

/* **** ADMIN Pages ****** */
/* Admin Global Components */
var AdminNavbar = require('./components/Admin/Components/AdminNavbar.vue').default
var AdminSidebar = require('./components/Admin/Components/AdminSidebar.vue').default

import 'vue-event-calendar/dist/style.css'
import vueEventCalendar from 'vue-event-calendar'
Vue.use(vueEventCalendar, {
        locale: 'en'
    })
    /* XX Admin Global Components XX */
    /************ Dashboard ********** */
var Dashboard = require('./components/Admin/Pages/Dashboard/Dashboard.vue').default
var TotalClients = require('./components/Admin/Pages/Dashboard/TotalClients.vue').default
var NewClients = require('./components/Admin/Pages/Dashboard/NewClients.vue').default
var SalesPerMonth = require('./components/Admin/Pages/Dashboard/SalesPerMonth.vue').default
var SalesPerPackage = require('./components/Admin/Pages/Dashboard/SalesPerPackage.vue').default
var UsersPerCity = require('./components/Admin/Pages/Dashboard/UsersPerCity.vue').default
var CancellationRequests = require('./components/Admin/Pages/Dashboard/CancellationRequests.vue').default
var ShowCancellationRequest = require('./components/Admin/Pages/Dashboard/ShowCancellationRequest.vue').default

/************ XX Dashboard XX ********** */
var Reports = require('./components/Admin/Pages/Reports/Reports.vue').default
    /* Packages */
var AdminPackages = require('./components/Admin/Pages/Packages/AdminPackages.vue').default
var DryClean = require('./components/Admin/Pages/Packages/DryClean.vue').default
var HouseHoldItems = require('./components/Admin/Pages/Packages/HouseHoldItems.vue').default
var Detergents = require('./components/Admin/Pages/Packages/Detergents.vue').default
var FabricSoftener = require('./components/Admin/Pages/Packages/FabricSoftener.vue').default
var DryerSheets = require('./components/Admin/Pages/Packages/DryerSheets.vue').default
var ScentBooster = require('./components/Admin/Pages/Packages/ScentBooster.vue').default

/* Create New Package */
var CreatePackage = require('./components/Admin/Pages/Packages/CreatePackage.vue').default
    /* show Package */
var ShowPackage = require('./components/Admin/Pages/Packages/ShowPackage.vue').default
    /* edit Package */
var EditPackage = require('./components/Admin/Pages/Packages/EditPackage.vue').default

/* Tailored */
var CreateTailoredPackage = require('./components/Admin/Pages/Packages/CreateTailoredPackage.vue').default
var EditTailoredPackage = require('./components/Admin/Pages/Packages/EditTailoredPackage.vue').default

/* XX Packages XX */
/* Users */
var Users = require('./components/Admin/Pages/Users/Users.vue').default
var ShowUser = require('./components/Admin/Pages/Users/ShowUser.vue').default
    /* XX Users XX */

/* ** Planners ** */
var PickupPlanner = require('./components/Admin/Pages/Planners/PickupPlanner.vue').default
var DelieveryPlanner = require('./components/Admin/Pages/Planners/DelieveryPlanner.vue').default


/* XX Planners XX */
/* ** Employees ** */
var Admins = require('./components/Admin/Pages/Employees/Admins/Admins.vue').default
var ShowAdmin = require('./components/Admin/Pages/Employees/Admins/ShowAdmin.vue').default
var Financials = require('./components/Admin/Components/Financials.vue').default
    /* Launder Staff */
var LaunderyStaff = require('./components/Admin/Pages/Employees/LaunderyStaff/LaunderyStaff.vue').default
var ShowLaunderyStaff = require('./components/Admin/Pages/Employees/LaunderyStaff/ShowLaunderyStaff.vue').default
var EditLaunderyStaff = require('./components/Admin/Pages/Employees/LaunderyStaff/EditLaunderyStaff.vue').default
var AddLaunderyStaff = require('./components/Admin/Pages/Employees/LaunderyStaff/AddLaunderyStaff.vue').default
    /* Launder Staff */

/* Drivers */
var Drivers = require('./components/Admin/Pages/Employees/Drivers/Drivers.vue').default
var ShowDriver = require('./components/Admin/Pages/Employees/Drivers/ShowDriver.vue').default
var EditDriver = require('./components/Admin/Pages/Employees/Drivers/EditDriver.vue').default
var AddDriver = require('./components/Admin/Pages/Employees/Drivers/AddDriver.vue').default
    /* Drivers */

/* XX Employees XX */

/* Promocodes */
var Promocodes = require('./components/Admin/Pages/Promocodes/Promocodes.vue').default
var AddPromocode = require('./components/Admin/Pages/Promocodes/AddPromocode.vue').default
var EditPromocode = require('./components/Admin/Pages/Promocodes/EditPromocode.vue').default
    /* XX Promocodes XX */

/* *********Zones ************* */
var Zones = require('./components/Admin/Pages/Zones/Zones.vue').default
var EditZone = require('./components/Admin/Pages/Zones/EditZone.vue').default
var AddZone = require('./components/Admin/Pages/Zones/AddZone.vue').default
    /* ********* XX Zones XX ************* */

/* ********* Cities ************* */
var Cities = require('./components/Admin/Pages/Cities/Cities.vue').default
    /* ********* XX Cities XX************* */


/* **** XX ADMIN Pages XX ****** */

const app = new Vue({
    el: '#app',
    store, //vuex
    components: {
        VueCarousel,
        /* Landing */
        LandingPage,
        /* User */
        Sidebar,
        Home,
        EditOrder,
        Packages,
        Categories,
        PackageSummary,
        PackageOrderSummary,
        PackageCreate,
        OnlinePayment,
        Profile,
        ProfileChangePassword,
        ProfileEdit,
        OldOrders,
        OldOrderDetails,
        Chat,
        /* Admin Pages */
        AdminNavbar,
        AdminSidebar,
        /* dashboard pages */
        Dashboard,
        TotalClients,
        NewClients,
        SalesPerMonth,
        SalesPerPackage,
        UsersPerCity,
        CancellationRequests,
        ShowCancellationRequest,
        /* XX dashboard pages XX */
        Reports,
        /* Packages */
        AdminPackages,
        DryClean,
        HouseHoldItems,
        Detergents,
        FabricSoftener,
        DryerSheets,
        ScentBooster,
        /* create package */
        CreatePackage,
        /* show package */
        ShowPackage,
        /* edit Package */
        EditPackage,
        /* Tailored Package */
        /* Create */
        CreateTailoredPackage,
        /* edit */
        EditTailoredPackage,
        /* XX Packages XX */
        Users,
        ShowUser,
        /*** Planners ***/
        PickupPlanner,
        DelieveryPlanner,
        /*** XX Planners XX ***/
        /***  Employees Pages ****/
        Admins,
        ShowAdmin,
        Financials,
        /* Drivers */
        Drivers,
        ShowDriver,
        EditDriver,
        AddDriver,
        /* Drivers */
        /* Laundery Staff */
        LaunderyStaff,
        ShowLaunderyStaff,
        EditLaunderyStaff,
        AddLaunderyStaff,
        /* Laundery Staff */
        /***  Employees Pages ****/
        /* Promocodes */
        Promocodes,
        AddPromocode,
        EditPromocode,
        /* Zones */
        Zones,
        EditZone,
        AddZone,
        /* Cities */
        Cities
    }
});