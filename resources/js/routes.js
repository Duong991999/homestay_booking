import VueRouter from 'vue-router';
import Basket from '@/basket/Basket.vue';
import Bookable from '@/bookable/Bookable.vue';
import Bookables from '@/bookables/Bookables.vue';
import Review from '@/review/Review.vue';
import Welcome from '@/auth/Welcome.vue';
import Category from '@/company/Category';
import Filter from '@/Auth/Filter';

const routes = [
    {
        path: '/',
        component: Bookables,
        name: 'home',
    },
    {
        path: '/filter',
        component: Filter,
        name: 'filter',
    },
    {
        path: '/auth/welcome',
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
        path: '/company/category',
        component: Category,
        name: 'category',
    },
    {
        path: '/company/inforbase',
        component: require('@/company/InforBase.vue').default,
        name: 'inforbase',
    },
    {
        path: '/company/inforroom',
        component: require('@/company/InforRoom.vue').default,
        name: 'inforroom',
    },
    {
        path: '/admin/category/index',
        component: require('@/admin/category/Index.vue').default,
        name: 'category.index',
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
});

export default router;
