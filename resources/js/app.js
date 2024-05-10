require('./bootstrap');

import Vue from 'vue';
import moment from 'moment';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import Index from './Index.vue';
import router from './routes';
import FatalError from './shared/Components/FatalError.vue';
import StarRating from './shared/Components/StarRating.vue';
import Success from './shared/Components/Success.vue';
import ValidationErrors from './shared/Components/ValidationErrors.vue';
import Loading from './shared/Components/Loading.vue';
import FullLoading from './shared/Components/FullScreenLoading.vue';
import storeDefinition from './store';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import DotLoader from 'vue-spinner/src/DotLoader.vue';

import TextInput from './shared/components/TextInput.vue';

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(Vuex);

Vue.filter('fromNow', (value) => moment(value).fromNow());

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
