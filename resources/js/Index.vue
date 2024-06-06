<template>
    <div>
        <FlashMessage :position="'right top'"></FlashMessage>
        <!--Thanh nav-->
        <nav
            class="navbar navbar-custom navbar-expand-lg justify-content-between fixed-top text-center"
            style="height: 80px"
        >
            <div>
                <router-link class="navbar-brand mb-0 h1" :to="{ name: 'welcome' }">
                    <img
                        class=""
                        src="assets/image/slide_home_screens/logo.jpg"
                        height="40"
                        alt="Homestaybooking"
                        style="margin-right: 3px; border-radius: 40px"
                    />HomestayBooking
                </router-link>
                <router-link
                    :to="{ name: 'auth.aboutus' }"
                    class="justify-content-between"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Về chúng tôi</router-link
                >
            </div>

            <div class="navbar-login">
                <router-link
                    :to="{ name: 'register' }"
                    class="nav-link-1"
                    v-if="!isLoggedIn"
                    style="text-decoration: none"
                    >Register</router-link
                >

                <router-link
                    :to="{ name: 'login' }"
                    class="nav-link-1"
                    v-if="!isLoggedIn"
                    style="text-decoration: none"
                    >Sign-in</router-link
                >

                <div class="dropdown show border-0" v-if="isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle p-0"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="dropdown.isOpen"
                        style="background-color: rgb(255 255 255)"
                    >
                        <img
                            src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                            width="40"
                            height="40"
                            class="rounded-circle"
                        />
                    </a>

                    <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="dropdownMenuLink"
                        style="border-radius: 10px"
                        :class="{ show: dropdown.isOpen }"
                    >
                        <a class="dropdown-item" href="#">Thông tin</a>
                        <a class="dropdown-item" href="#">Đơn đặt phòng của tôi</a>
                        <a class="dropdown-item" @click.prevent="logout"> Đăng xuất</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- <section class="" style="margin-top: 100px">
            <div class="container">
                <div class="card rounded-3 border">
                    <div class="d-sm-flex align-items-center justify-content-between px-4 pt-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl mr-3">
                                <img
                                    class="avatar-img rounded-circle"
                                    src=" assets/image/icon/user.png"
                                    width="40"
                                    alt="Avatar"
                                />
                            </div>
                            <h4 class="mb-0"><span class="fw-light">Hi</span> Jacqueline Miller</h4>
                        </div>
                        <div class="navbar-expand-xl d-xl-block d-none">
                            <ul class="nav nav-tabs justify-content-center border-bottom-0">
                                <li class="nav-item">
                                    <router-link
                                        to="/admin/category/index"
                                        class="nav-link-2"
                                        active-class="active"
                                        >Dashboard</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        to="/company/homestay/index"
                                        class="nav-link-2"
                                        active-class="active"
                                        >Listings</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        to="/company/guests/index"
                                        class="nav-link-2"
                                        active-class="active"
                                        >Bookings</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        to="/company/reviewlist"
                                        class="nav-link-2"
                                        active-class="active"
                                        >Reviews</router-link
                                    >
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        to="/company/inforroom"
                                        class="nav-link-2"
                                        active-class="active"
                                        >Settings</router-link
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <div class="container-lg mt-2 mb-2 px-2">
            <div class="container-lg mt-2 mb-2 px-2">
                <router-view></router-view>
            </div>
        </div>
        <footer-component></footer-component>
    </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';
import CONST_FRONTEND from './const';
export default {
    data() {
        return {
            dropdown: {
                isOpen: false,
            },
            lastSearch: this.$store.state.lastSearch,
            list_home_screen: CONST_FRONTEND.home_screen_file,
        };
    },
    computed: {
        ...mapState({
            lastSearchComputed: 'lastSearch',
            isLoggedIn: 'isLoggedIn',
        }),
        ...mapGetters({
            itemsInBasket: 'itemsInBasket',
        }),
        somethingElse() {
            return 1 + 2;
        },
    },
    methods: {
        async logout() {
            try {
                await axios.post('/api/auth/logout');
                this.$store.dispatch('logout');
            } catch (error) {
                this.$store.dispatch('logout');
            }
        },
        initializeCarousel() {
            $('.carousel').carousel({
                interval: 2000,
            });
        },
        toggleDropdown() {
            this.dropdown.isOpen = !this.dropdown.isOpen;
        },
    },
    mounted() {
        // Add mounted hook to handle scroll event
        const navEl = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY >= 50) {
                navEl.classList.add('navbar-scrolled');
            } else {
                navEl.classList.remove('navbar-scrolled');
            }
        });

        this.initializeCarousel();
    },
};
</script>

<style scoped>
.navbar {
    transition: all 0.1s;
}
.navbar-custom {
    height: 50px;
}

.navbar-brand {
    font-size: 30px;
    color: rgb(237, 195, 169);
    justify-content: center;
    margin-right: 4rem;
}
.navbar-login {
    flex-direction: row;
}
.nav-link-1 {
    background-color: rgb(248, 236, 223);
    color: rgb(253, 143, 75);
    padding: 8px 20px;
    margin: 10px;
    justify-content: center;
    border: 1px solid rgb(253, 143, 75);
    border-radius: 5px;
}
.nav-link-2 {
    font-weight: 500;
    font-size: 16px;
    border: 0;
    text-decoration: none;
    margin: 10px;
    padding: 10px 20px;
    border-radius: 20px;
    color: rgb(237, 195, 169);
    transition: color 0.3s ease;
}

.nav-link-2:hover,
.nav-link-2.active {
    color: rgb(253, 143, 75);
}
.navbar-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.navbar-scrolled {
    background-color: rgb(255 255 255);
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
.carousel-item {
    height: 600px;
    min-height: 600px;
    height: 600px;
    min-height: 600px;
    background: no-repeat scroll center scroll;
}
.dropdown {
    display: inline-block;
    background-color: aliceblue;
    flex-direction: row;
    border: 1px solid white;
    border-radius: 20px;
    margin: 16px;
}
.text-content {
    color: white;
    font-size: 30px;
    font-weight: 600;
    padding: 16px;
}
.form-input {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.btn-sm {
    padding: 0.25rem 0rem;
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem 0.5rem;
    clear: both;
    font-weight: 400;
    color: #eeae72;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}
</style>
