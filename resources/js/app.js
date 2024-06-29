require('./bootstrap');
require('@vueform/multiselect/themes/default.css');

import Vue from 'vue';
import moment from 'moment';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Index from './Index.vue';
import router from './routes';
import FatalError from './shared/components/FatalError.vue';
import Success from './shared/components/Success.vue';
import ValidationErrors from './shared/components/ValidationErrors.vue';
import Loading from './shared/components/Loading.vue';
import FullLoading from './shared/components/FullScreenLoading.vue';
import ImageMultipleInput from './shared/components/ImageMultipleInput.vue';
import Multiselect from '@vueform/multiselect/dist/multiselect.vue2.js';
import VueApexCharts from 'vue-apexcharts';

import storeDefinition from './store';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import DotLoader from 'vue-spinner/src/DotLoader.vue';
import FlashMessage from '@smartweb/vue-flash-message';
import FooterComponent from './shared/components/Footer.vue';

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(FlashMessage);
Vue.use(VueApexCharts);

Vue.filter('fromNow', (value) => moment(value).fromNow());
Vue.component('footer-component', FooterComponent);
Vue.component('fatal-error', FatalError);
Vue.component('success', Success);
Vue.component('v-errors', ValidationErrors);
Vue.component('v-loading', Loading);
Vue.component('v-fullloading', FullLoading);
Vue.component('v-image-multiple-input', ImageMultipleInput);
Vue.component('pulse-loader', PulseLoader);
Vue.component('dot-loader', DotLoader);
Vue.component('v-multi-select', Multiselect);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('apexchart', VueApexCharts);

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
