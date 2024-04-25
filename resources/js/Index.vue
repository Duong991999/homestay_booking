<template>
    <div>
        <nav
            class="navbar navbar-custom navbar-expand-lg justify-content-between fixed-top text-center"
        >
            <router-link class="navbar-brand mb-0 h1" :to="{ name: 'home' }">
                HomestayBooking</router-link
            >
            <!-- Dropdowm -->
            <div class="narbar-d">
                <div class="nav-item dropdown" v-if="!isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Lưu trú
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link :to="{ name: 'profile' }" class="dropdown-item"
                            >Profile</router-link
                        >
                    </div>
                </div>
                <div class="nav-item dropdown" v-if="!isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Chuyến bay
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link :to="{ name: 'profile' }" class="dropdown-item"
                            >Profile</router-link
                        >
                    </div>
                </div>
                <div class="nav-item dropdown" v-if="!isLoggedIn">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Chuyến bay + khách sạn
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link :to="{ name: 'profile' }" class="dropdown-item"
                            >Profile</router-link
                        >
                    </div>
                </div>
            </div>

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
        <div>
            <div style="z-index: 1">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators"></ol>
                    <div class="carousel-inner">
                        <div
                            v-for="(file, index) in list_home_screen"
                            :class="'carousel-item' + (index ? ' active' : '')"
                        >
                            <img
                                class="d-block w-100"
                                :src="`assets/image/slide_home_screens/${file}`"
                                :alt="`Slide ${index}`"
                            />
                        </div>
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselExampleIndicators"
                        role="button"
                        data-slide="prev"
                    >
                        <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> -->
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselExampleIndicators"
                        role="button"
                        data-slide="next"
                    >
                        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span> -->
                    </a>
                </div>
            </div>
            <div class="container" style="z-index: 1">
                <div class="row">
                    <div class="col-lg-12 bg-white shadow p-4 rounded">
                        <form>
                            <div class="row align-items-end">
                                <div class="col-lg-3">
                                    <label class="form-label" style="font-weight: 500"
                                        >Địa điểm</label
                                    >
                                    <input
                                        type="place"
                                        class="form-control shaw-none"
                                        placeholder="Nơi bạn muốn đến"
                                    />
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-label" style="font-weight: 500"
                                        >Ngày nhận phòng</label
                                    >
                                    <input type="date" class="form-control shaw-none" />
                                </div>
                                <div class="col-lg-3">
                                    <label class="form-label" style="font-weight: 500"
                                        >Ngày trả phòng</label
                                    >
                                    <input type="date" class="form-control shaw-none" />
                                </div>
                                <div class="col-lg-1">
                                    <button
                                        class="btn btn-primary text-white shadow-none custom-bg"
                                        type="submit"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';
import CONST_FRONTEND from './const';
import { button } from 'bootstrap';

export default {
    data() {
        return {
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
    color: rgb(21, 5, 245);
    justify-content: center;
}
.navbar-login {
    flex-direction: row;
}
.navbar-item-1 {
    padding: 16px;
    justify-content: space-between;
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
    background-color: rgb(28, 129, 251);
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}
.carousel-item {
    height: 40vh;
    min-height: 450px;
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

.custom-bg {
    background-color: #4882da;
}
.custom-bg:hover {
    background-color: #04419c;
}
</style>
