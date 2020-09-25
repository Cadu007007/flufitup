require('./bootstrap');

window.Vue = require('vue');

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

const app = new Vue({
    el: '#app',
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
        Chat
    }
});