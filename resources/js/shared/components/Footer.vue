<template>
    <footer class="pt-5" style="background-color: #000000de; margin-top: 100px">
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
                        Mặc dù một số thách thức ban đầu, chúng tôi chân thành tin rằng chúng tôi đã
                        nhận được sự hỗ trợ đầy đủ từ quý khách.
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
                                    style="width: 100px; height: 30px"
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
                            <a class="btn btn-sm shadow" href="#"
                                ><img
                                    src="assets/image/icon/facebook.png"
                                    class="h-30px"
                                    alt="ebay"
                                    style="width: 30px; height: 30px"
                            /></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-sm shadow" href="#"
                                ><img
                                    src="assets/image/icon/instagram.png"
                                    class="h-30px"
                                    alt="ebay"
                                    style="width: 30px; height: 30px"
                            /></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-sm shadow" href="#"
                                ><img
                                    src="assets/image/icon/linkedin.png"
                                    class="h-30px"
                                    alt="ebay"
                                    style="width: 30px; height: 30px"
                            /></a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-sm shadown" href="#"
                                ><img
                                    src="assets/image/icon/telegram.png"
                                    class="h-30px"
                                    alt="ebay"
                                    style="width: 30px; height: 30px"
                            /></a>
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
                        <div
                            class="text-body-secondary text-primary-hover text-decoration-none"
                            style="color: #c5c5c7"
                        >
                            Copyrights ©2024 Booking. Build by
                            <a href="#" class="text-body-secondary">Long@2k2</a>.
                        </div>
                        <div class="nav mt-2 mt-lg-0">
                            <ul class="list-inline text-primary-hover mx-auto mb-0">
                                <li class="list-inline-item me-0">
                                    <a
                                        class="nav-link text-body-secondary py-1 text-decoration-none"
                                        style="color: #c5c5c7"
                                        href="#"
                                        >Privacy policy</a
                                    >
                                </li>
                                <li class="list-inline-item me-0">
                                    <a
                                        class="nav-link text-body-secondary py-1 text-decoration-none"
                                        style="color: #c5c5c7"
                                        href="#"
                                        >Terms and conditions</a
                                    >
                                </li>
                                <li class="list-inline-item me-0">
                                    <a
                                        class="nav-link text-body-secondary py-1 pe-0 text-decoration-none"
                                        style="color: #c5c5c7"
                                        href="#"
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
</template>
<script></script>
<style>
.btn-sm {
    padding: 0.25rem 0rem;
}
</style>
