<template>
    <div>
        <!--Thanh nav-->
        <nav
            class="navbar navbar-custom navbar-expand-lg justify-content-between fixed-top text-center"
            style="height: 80px"
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
        <!--carousel---->
        <div class="container position-relative" v-if="showContainer" style="margin-top: 100px">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-6 position-relative mb-4 mb-md-0">
                    <h1 class="mb-4 mt-md-5 display-5 font-weight-bold">
                        Find the top <br /><span class="position-relative z-index-9">
                            Homestay nearby.
                            <span
                                class="position-absolute top-50 start-50 translate-middle z-index-n1 d-none d-md-block mt-4"
                                style="top: 0px; fill: antiquewhite"
                            >
                                <svg width="390.5px" height="21.5px">
                                    <path
                                        class="fill-primary opacity-7"
                                        d="M409.9,2.6c-9.7-0.6-19.5-1-29.2-1.5c-3.2-0.2-6.4-0.2-9.7-0.3c-7-0.2-14-0.4-20.9-0.5 c-3.9-0.1-7.8-0.2-11.7-0.3c-1.1,0-2.3,0-3.4,0c-2.5,0-5.1,0-7.6,0c-11.5,0-23,0-34.5,0c-2.7,0-5.5,0.1-8.2,0.1 c-6.8,0.1-13.6,0.2-20.3,0.3c-7.7,0.1-15.3,0.1-23,0.3c-12.4,0.3-24.8,0.6-37.1,0.9c-7.2,0.2-14.3,0.3-21.5,0.6 c-12.3,0.5-24.7,1-37,1.5c-6.7,0.3-13.5,0.5-20.2,0.9C112.7,5.3,99.9,6,87.1,6.7C80.3,7.1,73.5,7.4,66.7,8 C54,9.1,41.3,10.1,28.5,11.2c-2.7,0.2-5.5,0.5-8.2,0.7c-5.5,0.5-11,1.2-16.4,1.8c-0.3,0-0.7,0.1-1,0.1c-0.7,0.2-1.2,0.5-1.7,1 C0.4,15.6,0,16.6,0,17.6c0,1,0.4,2,1.1,2.7c0.7,0.7,1.8,1.2,2.7,1.1c6.6-0.7,13.2-1.5,19.8-2.1c6.1-0.5,12.3-1,18.4-1.6 c6.7-0.6,13.4-1.1,20.1-1.7c2.7-0.2,5.4-0.5,8.1-0.7c10.4-0.6,20.9-1.1,31.3-1.7c6.5-0.4,13-0.7,19.5-1.1c2.7-0.1,5.4-0.3,8.1-0.4 c10.3-0.4,20.7-0.8,31-1.2c6.3-0.2,12.5-0.5,18.8-0.7c2.1-0.1,4.2-0.2,6.3-0.2c11.2-0.3,22.3-0.5,33.5-0.8 c6.2-0.1,12.5-0.3,18.7-0.4c2.2-0.1,4.4-0.1,6.7-0.1c11.5-0.1,23-0.2,34.6-0.4c7.2-0.1,14.4-0.1,21.6-0.1c12.2,0,24.5,0.1,36.7,0.1 c2.4,0,4.8,0.1,7.2,0.2c6.8,0.2,13.5,0.4,20.3,0.6c5.1,0.2,10.1,0.3,15.2,0.4c3.6,0.1,7.2,0.4,10.8,0.6c10.6,0.6,21.1,1.2,31.7,1.8 c2.7,0.2,5.4,0.4,8,0.6c2.9,0.2,5.8,0.4,8.6,0.7c0.4,0.1,0.9,0.2,1.3,0.3c1.1,0.2,2.2,0.2,3.2-0.4c0.9-0.5,1.6-1.5,1.9-2.5 c0.6-2.2-0.7-4.5-2.9-5.2c-1.9-0.5-3.9-0.7-5.9-0.9c-1.4-0.1-2.7-0.3-4.1-0.4c-2.6-0.3-5.2-0.4-7.9-0.6 C419.7,3.1,414.8,2.9,409.9,2.6z"
                                    ></path></svg></span
                        ></span>
                    </h1>
                    <p class="mb-4">
                        We bring you not only a stay option, but an experience in your budget to
                        enjoy the luxury.
                    </p>
                </div>

                <div class="col-lg-6 position-relative z-0" style="box-sizing: border-box">
                    <div
                        id="carouselExampleIndicators"
                        class="carousel slide carousel-fade"
                        data-ride="carousel"
                    >
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
                                    style="border-radius: 10px; height: 600px"
                                />
                            </div>
                        </div>
                        <a
                            class="carousel-control-prev"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="prev"
                        >
                        </a>
                        <a
                            class="carousel-control-next"
                            href="#carouselExampleIndicators"
                            role="button"
                            data-slide="next"
                        >
                        </a>
                    </div>
                </div>
            </div>
            <!--Form-->
            <div class="row position-absolute" style="top: 500px; z-index: 1">
                <div class="col-xl-10 position-relative z-1 mt-n3 mt-xl-n9">
                    <h6 class="d-none d-xl-block mb-3">Check Availability</h6>
                    <form
                        class="card shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4"
                        style="width: 900px; border-radius: 30px"
                    >
                        <div class="row g-4 align-items-center">
                            <div class="input col-lg-4">
                                <input
                                    class="input__field"
                                    type="text"
                                    v-model="inputValue"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                />
                                <span class="input__label">Địa điểm</span>
                            </div>
                            <div class="col-lg-3">
                                <input
                                    class="input__field"
                                    type="date"
                                    v-model="star_day"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                />
                                <span class="input__label">Ngày nhận phòng</span>
                            </div>
                            <div class="col-lg-3">
                                <input
                                    class="input__field"
                                    type="date"
                                    v-model="close_day"
                                    @focus="isFocused = true"
                                    @blur="isFocused = false"
                                />
                                <span class="input__label">Ngày trả phòng</span>
                            </div>

                            <div class="col-lg-1 position-absolute" style="left: 850px">
                                <button
                                    class="btn btn-primary custom-bg border-0"
                                    type="submit"
                                    style="border-radius: 50px; width: 4rem; height: 4rem"
                                >
                                    <img
                                        src="assets/image/icon/search.png"
                                        alt="search "
                                        style="width: 100%"
                                    />
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="location_choice pb-2 pb-lg-5">
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
            <!--about-->

            <div class="container position-relative">
                <div class="row justify-content-around align-items-center">
                    <div class="col-lg-5 position-relative">
                        <img
                            src="assets/image/slide_home_screens/_2.jpg"
                            alt="about1"
                            class="rounded-3 position-relative"
                            style="height: 500px; width: 100%; border-radius: 10px"
                        />
                    </div>
                    <div class="col-lg-5">
                        <h2 class="mb-3 mb-lg-5 font-weight-bold">The Best Holidays Start Here!</h2>
                        <p class="mb-3 mb-lg-5 font-weight-light">
                            Book your hotel with us and don't forget to grab an awesome hotel deal
                            to save massive on your stay.
                        </p>
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div
                                    class="icon-lg rounded-circle flex-centered text-center"
                                    style="
                                        width: 50px;
                                        height: 50px;
                                        background-color: rgb(12 188 135 / 54%);
                                    "
                                >
                                    <img
                                        src="assets/image/icon/restaurant.png"
                                        alt=""
                                        class="rounded-3 mx-auto"
                                        style="width: 27px; height: 27px; margin-top: 10px"
                                    />
                                </div>
                                <h5 class="mt-2 font-weight-bold">Quality Food</h5>
                                <p class="mb-0">
                                    Departure defective arranging rapturous did. Conduct denied
                                    adding worthy little.
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div
                                    class="icon-lg rounded-circle flex-centered text-center"
                                    style="width: 50px; height: 50px; background-color: #df2c2c7d"
                                >
                                    <img
                                        src="assets/image/icon/time.png"
                                        alt=""
                                        class="rounded-3 mx-auto"
                                        style="width: 30px; height: 30px; margin-top: 10px"
                                    />
                                </div>
                                <h5 class="mt-2 font-weight-bold">Quick Services</h5>
                                <p class="mb-0">
                                    Supposing so be resolving breakfast am or perfectly.
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div
                                    class="icon-lg rounded-circle flex-centered text-center"
                                    style="width: 50px; height: 50px; background-color: #df852c87"
                                >
                                    <img
                                        src="assets/image/icon/secure.png"
                                        alt=""
                                        class="rounded-3 mx-auto"
                                        style="width: 30px; height: 30px; margin-top: 10px"
                                    />
                                </div>
                                <h5 class="mt-2 font-weight-bold">High Security</h5>
                                <p class="mb-0">
                                    Arranging rapturous did believe him all had supported.
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <div
                                    class="icon-lg rounded-circle flex-centered text-center"
                                    style="width: 50px; height: 50px; background-color: #1b99c67d"
                                >
                                    <img
                                        src="assets/image/icon/thunder.png"
                                        alt=""
                                        class="rounded-3 mx-auto"
                                        style="width: 30px; height: 30px; margin-top: 10px"
                                    />
                                </div>
                                <h5 class="mt-2 font-weight-bold">24 Hours Alert</h5>
                                <p class="mb-0">Rapturous did believe him all had supported.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
        <!--Comment-->
        <div class="container">
            <div id="carousel-comment" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div
                            class="row justify-content-between align-items-center"
                            style="margin-top: 110px"
                        >
                            <div class="col-md-6 col-lg-5 position-relative">
                                <image
                                    class="d-block w-100 rounded-3"
                                    src="assets/image/icon/like-comment.png"
                                    alt="First slide"
                                    style="width: 50px; height: 50px"
                                />
                                <img
                                    class="d-block w-100 rounded-3 mx-auto"
                                    src="assets/image/slide_home_screens/_1.jpg"
                                    alt="First slide"
                                />
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <span class="display-3 mb-0 text-primary">
                                    <image
                                        class="d-block w-100 rounded-3"
                                        src="assets/image/icon/like-comment.png"
                                        alt="First slide"
                                        style="width: 50px; height: 50px"
                                    />
                                    <h5 class="fw-light">
                                        Moonlight newspaper up its enjoyment agreeable depending.
                                        Timed voice share led him to widen noisy young. At weddings
                                        believed in laughing
                                    </h5>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div
                            class="row justify-content-between align-items-center"
                            style="margin-top: 110px"
                        >
                            <div class="col-md-6 col-lg-5 position-relative">
                                <img
                                    class="d-block w-100 rounded-3 mx-auto"
                                    src="assets/image/slide_home_screens/_1.jpg"
                                    alt="First slide"
                                />
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <span class="display-3 mb-0 text-primary">
                                    <img
                                        class="rounded-3 mx-auto"
                                        src="assets/image/icon/quote.png"
                                        alt="First slide"
                                        style="width: 50px; height: 50px"
                                    />
                                    <h5 class="fw-light">
                                        Moonlight newspaper up its enjoyment agreeable depending.
                                        Timed voice share led him to widen noisy young. At weddings
                                        believed in laughing
                                    </h5>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div
                            class="row justify-content-between align-items-center"
                            style="margin-top: 110px"
                        >
                            <div class="col-md-6 col-lg-5 position-relative">
                                <img
                                    class="d-block w-100 rounded-3 mx-auto"
                                    src="assets/image/slide_home_screens/_1.jpg"
                                    alt="First slide"
                                />
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <span class="display-3 mb-0 text-primary">
                                    <img
                                        class="rounded-3 mx-auto"
                                        src="assets/image/icon/quote.png"
                                        alt="First slide"
                                        style="width: 50px; height: 50px"
                                    />
                                    <h5 class="fw-light">
                                        Moonlight newspaper up its enjoyment agreeable depending.
                                        Timed voice share led him to widen noisy young. At weddings
                                        believed in laughing
                                    </h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <a
                    class="carousel-control-prev"
                    href="#carousel-comment"
                    role="button"
                    data-slide="prev"
                >
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a
                    class="carousel-control-next"
                    href="#carousel-comment"
                    role="button"
                    data-slide="next"
                >
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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
            // carouselItems: [], // Assuming carouselItems is an array of items
            scrollPosition: 0,
            cardWidth: 0,
            inputValue: '',
            star_day: '',
            close_day: '',
            isFocused: false,
            showContainer: true,
        };
    },
    created() {
        if (this.$route.name == 'bookable') {
            this.showContainer = false;
        }
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
                this.scrollPosition += this.cardWidth;
                this.$refs.carouselInner.scrollTo({
                    left: this.scrollPosition,
                    behavior: 'smooth',
                });
            }
        },
        scrollPrevious() {
            if (this.scrollPosition > 0) {
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
            if (window.scrollY >= 30) {
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
    background-color: #f87f06d2;
}
.custom-bg:hover {
    background-color: #04419c;
}
.location_choice {
    margin: 100px auto;
    width: 100%;
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
        flex: 0 0 25%;
    }
}
.card {
    width: 280px;
    margin: 0 1em;
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
.input {
    position: relative;
}

.input__label {
    position: absolute;
    left: 10px; /* Điều chỉnh khoảng cách từ mép trái */
    top: -10px; /* Điều chỉnh khoảng cách từ mép trên */
    background: white; /* Đổi màu nền nếu cần */
    padding: 0 5px; /* Điều chỉnh padding nếu cần */
    font-weight: bold;
    color: #888; /* Đổi màu chữ nếu cần */
    z-index: 1;
}

.input__field {
    box-sizing: border-box;
    width: 100%;
    border: 2px solid #ccc;
    padding: 10px;
    border-radius: 5px;
}

.input__field:focus + .input__label,
.input__field:not(:placeholder-shown) + .input__label {
    top: -10px; /* Điều chỉnh vị trí khi input field được focus */
    font-size: 12px; /* Điều chỉnh kích thước chữ khi input field được focus */
    color: #333; /* Đổi màu chữ khi input field được focus */
}
</style>
