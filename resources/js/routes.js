import VueRouter from 'vue-router';
import Basket from '@/basket/Basket.vue';
import Bookable from '@/bookable/Bookable.vue';
import Bookables from '@/bookables/Bookables.vue';
import Review from '@/review/Review.vue';
import Welcome from '@/user/Welcome.vue';

const routes = [
    {
        path: '/',
        component: Bookables,
        name: 'home',
    },
    {
        path: '/user/welcome',
        component: Welcome,
        name: 'welcome',
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
        path: '/auth/login',
        component: require('@/auth/Login.vue').default,
        name: 'login',
    },
    {
        path: '/company/inforbase',
        component:require('@/company/InforBase.vue').default ,
        name: 'inforbase',
    },
    {
        path: '/company/inforroom',
        component:require('@/company/InforRoom.vue').default ,
        name: 'inforroom',
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
});

export default router;
