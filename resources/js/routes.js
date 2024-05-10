import VueRouter from 'vue-router';
import Basket from '@/basket/Basket.vue';
import Bookable from '@/bookable/Bookable.vue';
import Bookables from '@/bookables/Bookables.vue';
import Review from '@/review/Review.vue';

const routes = [
    {
        path: '/',
        component: Bookables,
        name: 'home',
    },
    {
        path: '/dashboard',
        component: require('@/Dashboard.vue').default,
        name: 'dashboard',
    },
    {
        path: '/AuthenticatedLayout',
        component: require('@/Layouts/AuthenticatedLayout.vue').default,
        name: 'AuthenticatedLayout',
    },
    {
        path: '/bookable/:id',
        component: Bookable,
        name: 'bookable',
    },
    {
        path: '/review/:id',
        component: Review,
        name: 'review',
    },
    {
        path: '/basket',
        component: Basket,
        name: 'basket',
    },
    {
        path: '/auth/login',
        component: require('@/auth/Login.vue').default,
        name: 'login',
    },
    {
        path: '/auth/register',
        component: require('@/auth/Register.vue').default,
        name: 'register',
    },
    {
        path: '/rooms/create',
        component: require('@/company/Rooms/Create.vue').default,
        name: 'room',
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history',
});

export default router;
