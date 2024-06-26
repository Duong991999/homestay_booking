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
            <div class="d-flex justify-content-between" v-if="isLoggedIn">
                <router-link
                    :to="{ name: 'dashboard' }"
                    class="justify-content-between mr-2"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Quản lý doanh thu</router-link
                >
                <router-link
                    :to="{ name: 'company.homestay.index' }"
                    class="justify-content-between mr-2"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Quản lý Homestay</router-link
                >
                <router-link
                    :to="{ name: 'room.index' }"
                    class="justify-content-between mr-2"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Quản lý loại phòng</router-link
                >
                <router-link
                    :to="{ name: 'company.roomstatus.index' }"
                    class="justify-content-between mr-2"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Quản lý phòng</router-link
                >
                <router-link
                    :to="{ name: 'company.booking.index' }"
                    class="justify-content-between mr-2"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Quản lý đặt phòng</router-link
                >
                <router-link
                    :to="{ name: 'reviewlist' }"
                    class="justify-content-between mr-2"
                    style="text-decoration: none; font-size: 17px; color: rgb(237, 195, 169)"
                    >Quản lý đánh giá</router-link
                >
            </div> -->

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

                <div class="user-menu-wrap" v-if="isLoggedIn">
                    <a class="mini-photo-wrapper" href="#" @click="toggleMenu">
                        <img
                            class="mini-photo"
                            src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                            width="36"
                            height="36"
                        />
                    </a>
                    <div :class="['menu-container', { active: isActive }]">
                        <ul class="user-menu">
                            <div class="profile-highlight">
                                <img
                                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                    alt="profile-img"
                                    width="36"
                                    height="36"
                                />
                                <div class="details">
                                    <div id="profile-name">Kenny Lee</div>
                                </div>
                            </div>
                            <li class="user-menu__item">
                                <a class="user-menu-link" href="#">
                                    <img
                                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/trophy.png"
                                        alt="trophy_icon"
                                        width="20"
                                        height="20"
                                    />
                                    <div>Achievements</div>
                                </a>
                            </li>
                            <li class="user-menu__item">
                                <a class="user-menu-link" href="#">
                                    <img
                                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/team.png"
                                        alt="team_icon"
                                        width="20"
                                        height="20"
                                    />
                                    <div>Team</div>
                                </a>
                            </li>
                            <li class="user-menu__item">
                                <a class="user-menu-link" href="#">
                                    <img
                                        src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1604623/book.png"
                                        alt="team_icon"
                                        width="20"
                                        height="20"
                                    />
                                    <div>Log History</div>
                                </a>
                            </li>
                            <div class="footer">
                                <li class="user-menu__item">
                                    <a class="user-menu-link" style="color: #f44336" @click="logout"
                                        >Logout</a
                                    >
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

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
            isActive: false,
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
        toggleMenu() {
            this.isActive = !this.isActive;
        },
    },
    mounted() {
        // Add mounted hook to handle scroll event
        const navEl = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY >= 100) {
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
    transition: all 0.5s;
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

:root {
    --nav-link-color: #666666;
    --bg-color: #f3f5f4;
    --navbar-color: #ffffff;
    --border-gray: #e0e0e0;
    --hover-gray: #f5f5f5;
    --active-gray: #ebebeb;
    --at-blue-light: #00afe9;
    --at-blue-dark: #006ab8;
    --red: #f44336;
}

* {
    box-sizing: border-box;
}

body {
    background-color: #ffffff;
    font-family: sans-serif;
}

ul {
    list-style: none;
}

.user-menu-wrap {
    position: relative;
    width: 36px;
    margin: 50px;
    border: 1px solid rgba(0, 0, 0, 0);
}

.menu-container {
    visibility: hidden;
    opacity: 0;
    transition: all 0.2s ease-in-out;
}
.menu-container.active {
    visibility: visible;
    opacity: 1;
}

.user-menu {
    position: absolute;
    right: -10px;
    background-color: #ffffff;
    width: 200px;
    border-radius: 10px;
    border: 1px solid rgba(0, 0, 0, 0.15);
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 0px;
    margin-top: 20px;
}

.profile-highlight {
    display: flex;
    border-bottom: 1px solid var(--border-gray);
    padding: 12px 16px;
    margin-bottom: 6px;
}
.profile-highlight img {
    width: 48px;
    height: 48px;
    border-radius: 25px;
    object-fit: cover;
}
.profile-highlight .details {
    display: flex;
    flex-direction: column;
    margin: auto 12px;
}
.profile-highlight .details #profile-name {
    font-weight: 600;
    font-size: 16px;
}
.profile-highlight .details #profile-footer {
    font-weight: 300;
    font-size: 14px;
    margin-top: 4px;
}

.footer {
    border-top: 1px solid var(--border-gray);
    padding-top: 6px;
    margin-top: 6px;
}
.footer .user-menu-link {
    font-size: 13px;
}

.user-menu-link {
    display: flex;
    text-decoration: none;
    color: #333333;
    font-weight: 400;
    font-size: 14px;
    padding: 12px 16px;
}
.user-menu-link div {
    margin: auto 10px;
}
.user-menu-link:hover {
    background-color: var(--hover-gray);
    color: #333333;
}

.user-menu:before {
    position: absolute;
    top: -16px;
    left: 120px;
    display: inline-block;
    content: '';
    border: 8px solid transparent;
    border-bottom-color: var(--border-gray);
}
.user-menu:after {
    position: absolute;
    top: -14px;
    left: 121px;
    display: inline-block;
    content: '';
    border: 7px solid transparent;
    border-bottom-color: #ffffff;
}
</style>
