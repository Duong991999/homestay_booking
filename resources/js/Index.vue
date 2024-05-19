<template>
    <div>
        <!--Thanh nav-->
        <nav
            class="navbar navbar-custom navbar-expand-lg justify-content-between fixed-top text-center"
            style="height: 80px"
        >
            <router-link class="navbar-brand mb-0 h1" :to="{ name: 'welcome' }">
                <img
                    class=""
                    src="assets/image/slide_home_screens/logo.jpg"
                    height="40"
                    alt="Homestaybooking"
                    style="margin-right: 3px; border-radius: 40px"
                />HomestayBooking
            </router-link>

            <div class="navbar-login">
                <router-link
                    :to="{ name: 'basket' }"
                    class="nav-link-1"
                    style="text-decoration: none"
                >
                    Basket
                    <span v-if="itemsInBasket" class="badge badge-secondary">{{
                        itemsInBasket
                    }}</span>
                </router-link>

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
                <router-link
                    :to="{ name: 'category' }"
                    class="nav-link-1"
                    v-if="isLoggedIn"
                    style="text-decoration: none"
                    >Category</router-link
                >

                <a
                    class="nav-link-1"
                    href="#"
                    @click.prevent="logout"
                    style="text-decoration: none"
                    v-if="isLoggedIn"
                    >Logout</a
                >
            </div>
        </nav>

        <div class="container-lg mt-2 mb-2 px-2">
            <div class="container-lg mt-2 mb-2 px-2">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';
import CONST_FRONTEND from './const';
export default {
    data() {
        return {
            lastSearch: this.$store.state.lastSearch,
            list_home_screen: CONST_FRONTEND.home_screen_file,
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
                axios.post('/logout');
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
    },
    mounted() {
        // Add mounted hook to handle scroll event
        const navEl = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY >= 200) {
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
    color: rgb(237, 195, 169);
    justify-content: center;
}
.navbar-login {
    flex-direction: row;
}
.nav-link-1 {
    background-color: aliceblue;
    color: #003b95;
    padding: 8px 20px;
    margin: 10px;
    justify-content: center;
    border: 1px solid #003b95;
    border-radius: 5px;
}
.navbar-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.navbar-scrolled {
    background-color: rgb(249, 249, 249);
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
</style>
