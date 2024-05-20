import VueRouter from 'vue-router';
import Basket from '@/basket/Basket.vue';
import Bookable from '@/bookable/Bookable.vue';
import Bookables from '@/bookables/Bookables.vue';
import Review from '@/review/Review.vue';
import Welcome from '@/auth/Welcome.vue';
import Category from '@/company/Category';

const routes = [
    {
        path: '/',
        component: Bookables,
        name: 'home',
    },
    {
        path: '/auth/welcome',
        component: Welcome,
        name: 'welcome',
    },
<<<<<<< HEAD
    {
        path: '/company/category',
        component: Category,
        name: 'category',
    },
=======

>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
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
<<<<<<< HEAD
        path: '/company/homestay/index',
        component: require('@/company/homestay/Index.vue').default,
        name: 'company.homestay.index',
    },
    {
        path: '/admin/index',
        component: require('@/admin/Index.vue').default,
        name: 'admin.index',
    },
    {
        path: '/admin/category/index',
        component: require('@/admin/category/Index.vue').default,
        name: 'category.index',
    },
    {
        path: '/company/homestay/index',
        component: require('@/company/homestay/Index.vue').default,
        name: 'homestay.index',
=======
        path: '/admin/category/index',
        component: require('@/admin/category/Index.vue').default,
        name: 'inforroom',
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
});

export default router;
