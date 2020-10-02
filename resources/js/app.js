require('./bootstrap');

window.Vue = require('vue');

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from "./store/index"

const store = new Vuex.Store(
    storeData
)


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
var AdminNavbar = require('./components/Admin/Components/AdminNavbar.vue').default
var AdminSidebar = require('./components/Admin/Components/AdminSidebar.vue').default
var Dashboard = require('./components/Admin/Pages/Dashboard/Dashboard.vue').default
var Reports = require('./components/Admin/Pages/Reports/Reports.vue').default
var AdminPackages = require('./components/Admin/Pages/Packages/AdminPackages.vue').default
var Admins = require('./components/Admin/Pages/Admins/Admins.vue').default
    /* Users */
var Users = require('./components/Admin/Pages/Users/Users.vue').default
var ShowUser = require('./components/Admin/Pages/Users/ShowUser.vue').default
    /* XX Users XX */

/* **** XX ADMIN Pages XX ****** */

const app = new Vue({
    el: '#app',
    store, //vuex
    components: {
        Sidebar,
        Home,
        EditOrder,
        Packages,
        PackageSummary,
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
        Dashboard,
        Reports,
        AdminPackages,
        Users,
        ShowUser,
        Admins,
    }
});