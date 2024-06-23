import VueRouter from 'vue-router';
import Basket from '@/basket/Basket.vue';
import Detail from '@/homestay/Detail.vue';
import Welcome from '@/auth/Welcome.vue';
import Category from '@/company/Category';
import Amenities from '@/homestay/Amenities.vue';
import Room from '@/homestay/Room.vue';
import InforRoom from '@/company/InforRoom.vue';

const routes = [
    {
        path: '/auth/aboutus',
        component: require('@/auth/AboutUs.vue').default,
        name: 'auth.aboutus',
    },
    {
        path: '/',
        component: Welcome,
        name: 'welcome',
    },

    {
        path: '/homestay/detail/:id',
        component: Detail,
        name: 'detail',
    },
    {
        path: '/amenities',
        component: Amenities,
        name: 'amenitiese',
    },

    {
        path: '/room',
        component: require('@/homestay/Room.vue').default,
        name: 'room',
    },
    {
        path: '/inforroom',
        component: InforRoom,
        name: 'inforroom',
    },
    {
        path: '/homestay/Congratulation',
        component: require('@/homestay/Congratulation.vue').default,
        name: 'congratulation',
    },
    // {
    //     path: '/review/:id',
    //     component: Review,
    //     name: 'review',
    // },
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
        path: '/company/inforbase/:id',
        component: require('@/company/InforBase.vue').default,
        name: 'inforbase',
    },
    {
        path: '/company/inforbase',
        component: require('@/company/InforBase.vue').default,
        name: 'createHomestay',
    },
    {
        path: '/company/inforroom',
        component: require('@/company/InforRoom.vue').default,
        name: 'inforroom',
    },
    {
        path: '/company/room/index',
        component: require('@/company/room/Index.vue').default,
        name: 'room.index',
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
    {
        path: '/profile',
        component: require('@/profile/Index.vue').default,
        name: 'profile',
    },
    {
        path: '/formcheck',
        component: require('@/homestay/FormCheck.vue').default,
        name: 'formcheck',
    },
    {
        path: '/imagelist',
        component: require('@/homestay/ImageList.vue').default,
        name: 'imagelist',
    },
    {
        path: '/user/mybooking',
        component: require('@/user/mybooking/MyBooking.vue').default,
        name: 'mybooking',
    },
    {
        path: '/company/reviewlist',
        component: require('@/company/reviewlist/ReviewList.vue').default,
        name: 'reviewlist',
    },
    {
        path: '/search',
        component: require('@/user/homestay/Search.vue').default,
        name: 'search',
        props: (route) => ({ query: route.query }),
    },
    {
        path: '/company/dashboard',
        component: require('@/company/Dashboard.vue').default,
        name: 'dashboard',
    },
    {
        path: '/company/room/editroom',
        component: require('@/company/room/EditRoom.vue').default,
        name: 'room.editroom',
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
});

export default router;
