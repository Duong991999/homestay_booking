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
                    v-if="!isLoggedIn"
                    style="text-decoration: none"
                    >Catelory</router-link
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
        <footer class="pt-5" style="background-color: #000000de">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4" style="padding-right: 30px">
                        <router-link
                            class="mb-0 h4 text-decoration-none"
                            :to="{ name: 'welcome' }"
                            style="color: rgb(237, 195, 169)"
                        >
                            <img
                                class=""
                                src="assets/image/slide_home_screens/logo.jpg"
                                height="30"
                                alt="Homestaybooking"
                                style="margin-right: 3px; border-radius: 40px"
                            />HomestayBooking
                        </router-link>
                        <p class="my-3 text-body-secondary" style="color: #c5c5c7; font-size: 14px">
                            Mặc dù một số thách thức ban đầu, chúng tôi chân thành tin rằng chúng
                            tôi đã nhận được sự hỗ trợ đầy đủ từ quý khách.
                        </p>
                        <p class="mb-2">
                            <a
                                href="#"
                                class="text-body-secondary text-primary-hover text-decoration-none"
                                style="color: #c5c5c7"
                                ><svg
                                    width="1em"
                                    height="1em"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="me-1 mb-1"
                                >
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"
                                    ></path>
                                </svg>
                                +1234 568 963</a
                            >
                        </p>
                        <p class="mb-0">
                            <a
                                href="#"
                                class="text-body-secondary text-primary-hover text-decoration-none"
                                style="color: #c5c5c7"
                                ><svg
                                    width="1em"
                                    height="1em"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="me-1 mb-1"
                                >
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"
                                    ></path>
                                </svg>
                                example@gmail.com</a
                            >
                        </p>
                    </div>
                    <div class="col-lg-8 ms-auto">
                        <div class="row g-4">
                            <div class="col-md-3 col-6">
                                <h5 class="text-white mb-2">Trang</h5>
                                <ul
                                    class="nav flex-column text-primary-hover my-3 text-decoration-none"
                                >
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            About us</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Contact us</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-6">
                                <h5 class="text-white mb-2">Liên kết</h5>
                                <ul class="nav flex-column text-primary-hover my-3">
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Đăng kí</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Đăng nhập</a
                                        >
                                    </li>
                                    <li class="nav-item"></li>
                                    <li class="nav-item"></li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Tập tin</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Hỗ trợ</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-6">
                                <h5 class="text-white mb-2">Khu vực</h5>
                                <ul class="nav flex-column text-primary-hover my-3">
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Hà Nội</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            TP.Hồ Chí Minh</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Đà Nẵng</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="#"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                            ><!---->
                                            Hải Phòng</a
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-6">
                                <h5 class="text-white mb-2">Đặt phòng</h5>
                                <ul class="nav flex-column text-primary-hover my-3">
                                    <li class="nav-item">
                                        <a
                                            aria-current="page"
                                            href="/booking_v/"
                                            class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                            style="color: #c5c5c7; font-size: 14px"
                                        >
                                            Hotel</a
                                        >
                                    </li>
                                    <li class="nav-item"></li>
                                    <li class="nav-item"></li>
                                    <li class="nav-item"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" style="margin-left: 4px">
                    <h5 class="mb-2 text-white">Tìm kiếm hàng đầu</h5>
                    <ul class="list-inline text-primary-hover lh-lg">
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Hotels</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Tour</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Cabs</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >About</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Contact us</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Blogs</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Services</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Detail page</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Policy</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Testimonials</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Newsletters</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Podcasts</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Protests</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Sports</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Tech and Auto</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Opinion</a
                            >
                        </li>
                        <li class="list-inline-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active text-body-secondary text-decoration-none"
                                style="color: #c5c5c7; font-size: 14px"
                                >Share Market</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="row g-4 justify-content-between mt-0 mt-md-2">
                    <div class="col-sm-7 col-md-6 col-lg-4">
                        <h5 class="text-white mb-2">Thanh toán &amp; Bảo mật</h5>
                        <ul class="list-inline mb-0 mt-3 hstack gap-1 justify-content-start">
                            <li class="list-inline-item">
                                <a href="#"
                                    ><img
                                        src="assets/image/icon/paypal.png"
                                        class=""
                                        alt="paypal"
                                        style="width: 90px; height: 30px"
                                /></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"
                                    ><img
                                        src="assets/image/icon/visa.png"
                                        class=""
                                        alt="visa"
                                        style="width: 50px; height: 50px"
                                /></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"
                                    ><img
                                        src="assets/image/icon/mastercard.png"
                                        class="h-30px"
                                        alt="mastercard"
                                        style="width: 50px; height: 30px"
                                /></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"
                                    ><img
                                        src="assets/image/icon/ebay.png"
                                        class="h-30px"
                                        alt="ebay"
                                        style="width: 40px; height: 40px"
                                /></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col-md-6 col-lg-3 text-sm-end">
                        <h5 class="text-white mb-2">Theo dõi chúng tôi tại</h5>
                        <ul class="list-inline mb-0 mt-3 hstack gap-1 justify-content-end">
                            <li class="list-inline-item">
                                <a class="btn btn-sm px-2 bg-facebook mb-0" href="#"
                                    ><svg
                                        class="svg-inline--fa fa-facebook fab fa-fw"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fab"
                                        data-icon="facebook"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                    >
                                        <path
                                            class=""
                                            fill="currentColor"
                                            d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"
                                        ></path></svg
                                ></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm shadow px-2 bg-instagram mb-0" href="#"
                                    ><svg
                                        class="svg-inline--fa fa-instagram fab fa-fw"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fab"
                                        data-icon="instagram"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"
                                    >
                                        <path
                                            class=""
                                            fill="currentColor"
                                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                                        ></path></svg
                                ></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm shadow px-2 bg-twitter mb-0" href="#"
                                    ><svg
                                        class="svg-inline--fa fa-twitter fab fa-fw"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fab"
                                        data-icon="twitter"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                    >
                                        <path
                                            class=""
                                            fill="currentColor"
                                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                                        ></path></svg
                                ></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-sm shadow px-2 bg-linkedin mb-0" href="#"
                                    ><svg
                                        class="svg-inline--fa fa-linkedin-in fab fa-fw"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fab"
                                        data-icon="linkedin-in"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"
                                    >
                                        <path
                                            class=""
                                            fill="currentColor"
                                            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                                        ></path></svg
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="mt-4 mb-0" />
                <div class="row">
                    <div class="container">
                        <div
                            class="d-lg-flex justify-content-between align-items-center py-3 text-center text-lg-start"
                        >
                            <div class="text-body-secondary text-primary-hover">
                                Copyrights ©2024 Booking. Build by
                                <a href="https://coderthemes.com/" class="text-body-secondary"
                                    >Coderthemes</a
                                >.
                            </div>
                            <div class="nav mt-2 mt-lg-0">
                                <ul class="list-inline text-primary-hover mx-auto mb-0">
                                    <li class="list-inline-item me-0">
                                        <a class="nav-link text-body-secondary py-1" href="#"
                                            >Privacy policy</a
                                        >
                                    </li>
                                    <li class="list-inline-item me-0">
                                        <a class="nav-link text-body-secondary py-1" href="#"
                                            >Terms and conditions</a
                                        >
                                    </li>
                                    <li class="list-inline-item me-0">
                                        <a class="nav-link text-body-secondary py-1 pe-0" href="#"
                                            >Refund policy</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
