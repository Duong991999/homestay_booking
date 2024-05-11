<template>
    <div>
        <nav
            class="navbar navbar-custom navbar-expand-lg justify-content-between fixed-top text-center"
        >
            <router-link class="navbar-brand mb-0 h1" :to="{ name: 'home' }">
                <img
                    class=""
                    src="assets/image/slide_home_screens/logo.jpg"
                    height="40"
                    alt="Homestaybooking"
                    style="margin-right: 3px; border-radius: 40px"
                />HomestayBooking
            </router-link>

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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
            </ol>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12 bg-white shadow p-4 rounded">
                    <form>
                        <div class="row align-items-end">
                            <div class="col-lg-3">
                                <label class="form-label" style="font-weight: 500">Địa điểm</label>
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
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Location noi bat  -->
        <div class="location_choice">
            <div>
                <span
                    style="
                        font-size: 24px;
                        line-height: 30px;
                        font-weight: 500;
                        color: rgb(42, 42, 46);
                        padding-bottom: 8px;
                        display: block;
                        text-align: center;
                    "
                >
                    Các địa điểm du lịch nổi bật
                </span>
                <div>
                    <!--carousel-->
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner-location" ref="carouselInner">
                            <div class="carousel-item-location active" ref="carouselItem">
                                <div class="cards-wrapper">
                                    <div class="card">
                                        <img
                                            src="assets/image/slide_home_screens/_2.jpg"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Địa điểm</h5>
                                            <p class="card-text text-center">Số homestay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-location">
                                <div class="cards-wrapper">
                                    <div class="card">
                                        <img
                                            src="assets/image/slide_home_screens/_1.jpg"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Địa điểm</h5>
                                            <p class="card-text text-center">Số homestay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-location">
                                <div class="cards-wrapper">
                                    <div class="card">
                                        <img
                                            src="assets/image/slide_home_screens/_2.jpg"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Địa điểm</h5>
                                            <p class="card-text text-center">Số homestay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-location">
                                <div class="cards-wrapper">
                                    <div class="card">
                                        <img
                                            src="assets/image/slide_home_screens/_2.jpg"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Địa điểm</h5>
                                            <p class="card-text text-center">Số homestay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-location">
                                <div class="cards-wrapper">
                                    <div class="card">
                                        <img
                                            src="assets/image/slide_home_screens/_2.jpg"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Địa điểm</h5>
                                            <p class="card-text text-center">Số homestay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item-location">
                                <div class="cards-wrapper">
                                    <div class="card">
                                        <img
                                            src="assets/image/slide_home_screens/_2.jpg"
                                            class="card-img-top"
                                            alt="..."
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Địa điểm</h5>
                                            <p class="card-text text-center">Số homestay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            class="carousel-control-prev-location carousel-control-prev"
                            type="button"
                            data-target="#carouselExampleControls"
                            data-slide="prev"
                            @click="scrollPrevious"
                        >
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next-location carousel-control-next"
                            type="button"
                            data-target="#carouselExampleControls"
                            data-slide="next"
                            @click="scrollNext"
                        >
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
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

export default {
    data() {
        return {
            lastSearch: this.$store.state.lastSearch,
            list_home_screen: CONST_FRONTEND.home_screen_file,
            // carouselItems: [], // Assuming carouselItems is an array of items
            scrollPosition: 0,
            cardWidth: 0,
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
        scrollNext() {
            const carouselWidth = this.$refs.carouselInner.scrollWidth;
            if (this.scrollPosition < carouselWidth - this.cardWidth * 3) {
                console.log('Button clicked');
                this.scrollPosition += this.cardWidth;
                this.$refs.carouselInner.scrollTo({
                    left: this.scrollPosition,
                    behavior: 'smooth',
                });
            }
        },
        scrollPrevious() {
            if (this.scrollPosition > 0) {
                console.log('Button clicked');
                this.scrollPosition -= this.cardWidth;
                this.$refs.carouselInner.scrollTo({
                    left: this.scrollPosition,
                    behavior: 'smooth',
                });
            }
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
        this.cardWidth = this.$refs.carouselItem.clientWidth; // Get card width on mount
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
    background-color: rgb(249, 249, 249);
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
.location_choice {
    margin: 64px auto;
    width: 90%;
}
@media (min-width: 500px) {
    .carousel-inner-location {
        display: flex;
        padding: 1rem;
        overflow-x: hidden;
    }

    .carousel-item-location {
        display: inline-block;
        margin-right: 0;
        flex: 0 0 33.3%;
    }
}
.card {
    margin: 0 0.5em;
    border: none;
}
.carousel-control-prev-location,
.carousel-control-next-location {
    background-color: #e1e1e1;
    width: 6vh;
    height: 6vh;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
}
</style>
