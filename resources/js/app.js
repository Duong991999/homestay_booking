require('./bootstrap');

import Vue from 'vue';
import moment from 'moment';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Index from './Index.vue';
import router from './routes';
import FatalError from './shared/components/FatalError.vue';
import StarRating from './shared/components/StarRating.vue';
import Success from './shared/components/Success.vue';
import ValidationErrors from './shared/components/ValidationErrors.vue';
import Loading from './shared/components/Loading.vue';
import FullLoading from './shared/components/FullScreenLoading.vue';
import storeDefinition from './store';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import DotLoader from 'vue-spinner/src/DotLoader.vue';
import ApplicationLogo from './shared/components/ApplicationLogo.vue';
import Checkbox from './shared/components/Checkbox.vue';
import DangerButton from './shared/components/DangerButton.vue';
import Dropdown from './shared/components/Dropdown.vue';
import DropdownLink from './shared/components/DropdownLink.vue';
import NavLink from './shared/components/NavLink.vue';
import ResponsiveNavLink from './shared/components/ResponsiveNavLink.vue';

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(Vuex);

Vue.filter('fromNow', (value) => moment(value).fromNow());
Vue.component('application-logo', ApplicationLogo);
Vue.component('nav-link', NavLink);
Vue.component('check-box', Checkbox);
Vue.component('dropdown-link', DropdownLink);
Vue.component('resposive-navlink', ResponsiveNavLink);
Vue.component('dropdown', Dropdown);
Vue.component('star-rating', StarRating);
Vue.component('fatal-error', FatalError);
Vue.component('success', Success);
Vue.component('v-errors', ValidationErrors);
Vue.component('v-loading', Loading);
Vue.component('v-fullloading', FullLoading);
Vue.component('pulse-loader', PulseLoader);
Vue.component('dot-loader', DotLoader);
const store = new Vuex.Store(storeDefinition);

window.axios.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

window.axios.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        if (401 === error.response.status) {
            store.dispatch('logout');
        }

        return Promise.reject(error);
    }
);

// router.beforeEach((to, from, next) => {
//     // Check if the route has a meta field with "refresh" set to true
//     if (to.meta.refresh) {
//         // Use router.go() to reload the current route
//         router.go();
//     } else {
//         // Proceed with the navigation as usual
//         next();
//     }
// });

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        index: Index,
    },
    async beforeCreate() {
        this.$store.dispatch('loadStoredState');
        this.$store.dispatch('loadUser');
    },
});
