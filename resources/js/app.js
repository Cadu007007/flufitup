require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

var Sidebar = require('./components/User/Sidebar.vue').default

var Home = require('./components/User/Pages/Home.vue').default

const app = new Vue({
    el: '#app',
    components: {
        Sidebar,
        Home,
    }
});