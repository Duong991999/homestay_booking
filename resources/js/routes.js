import VueRouter from 'vue-router';
import Basket from '@/basket/Basket.vue';
import Bookable from '@/bookable/Bookable.vue';
import Bookables from '@/bookables/Bookables.vue';
import Review from '@/review/Review.vue';
import Welcome from '@/auth/Welcome.vue';
import Category from '@/company/Category';
import Filter from '@/Auth/Filter';
import Amenities from '@/bookable/Amenities.vue';
import Room from '@/bookable/Room.vue';
import InforRoom from '@/company/InforRoom.vue';

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
        path: '/bookable',
        component: Bookable,
        name: 'bookable',
    },
    {
        path: '/amenities',
        component: Amenities,
        name: 'amenitiese',
    },
    {
        path: '/inforroom',
        component: InforRoom,
        name: 'inforroom',
    },
    {
        path: '/',
        component: Room,
        name: 'room',
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
        path: '/company/homestay/index',
        component: require('@/company/homestay/Index.vue').default,
        name: 'company.homestay.index',
    },
    {
        path: '/company/homestay/edit/:id',
        component: require('@/company/homestay/Edit.vue').default,
        name: 'inforbase',
    },
    {
        path: '/company/homestay/create',
        component: require('@/company/homestay/Create.vue').default,
        name: 'createhomestay',
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
    {
        path: '/company/bookings/index',
        component: require('@/company/bookings/Index.vue').default,
        name: 'company.booking.index',
    },
    {
        path: '/company/guests/index',
        component: require('@/company/guests/Index.vue').default,
        name: 'company.guests.index',
    },
    {
        path: '/company/index',
        component: require('@/company/Index.vue').default,
        name: 'company.index',
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
});

export default router;
