require('./bootstrap');

window.Vue = require('vue');

/* user components */
var Sidebar = require('./components/User/Components/Sidebar.vue').default

/* user pages */
var Home = require('./components/User/Pages/Home/Home.vue').default

/* Packages */
var Packages = require('./components/User/Pages/Packages/Packages.vue').default
var PackageSummary = require('./components/User/Pages/Packages/PackageSummary.vue').default
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
        Packages,
        PackageSummary,
        Profile,
        ProfileChangePassword,
        ProfileEdit,
        OldOrders,
        OldOrderDetails,
        Chat
    }
});