require('./bootstrap');

window.Vue = require('vue');

/* user components */
var Sidebar = require('./components/User/Components/Sidebar.vue').default

/* user pages */
var Home = require('./components/User/Pages/Home.vue').default
var Packages = require('./components/User/Pages/Packages.vue').default
var Profile = require('./components/User/Pages/Profile.vue').default

const app = new Vue({
    el: '#app',
    components: {
        Sidebar,
        Home,
        Packages,
        Profile
    }
});