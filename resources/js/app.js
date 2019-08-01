/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const axios = require('axios');
// import Toastr from '@enso-ui/toastr/bulma';
// import ToastrPlugin from '@enso-ui/toastr';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { VueTable } from '@enso-ui/tables/bulma';
import {
    Tabs, Tab, VueFilter,
    IntervalFilter, DateIntervalFilter, SelectFilter as VueSelectFilter,
} from '@enso-ui/tables/bulma';

window.Vue = require('vue');
Vue.component('fa', FontAwesomeIcon);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(ToastrPlugin, {
    layout: Toastr,
    options: {
        duration: 3500,
        position: 'right',
    },
});

window.axios = axios;

const app = new Vue({
    el: '#app',
    components: {
        VueTable,
        // VueFilter,
        // VueSelectFilter,
        // IntervalFilter,
        // DateIntervalFilter,
    }
});

$('.carousel').carousel();
