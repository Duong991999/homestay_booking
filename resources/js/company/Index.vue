<template>
    <section class="pt-4">
        <div class="container">
            <div class="card rounded-3 border w-100">
                <div class="d-sm-flex align-items-center">
                    <div class="avatar avatar-xl mb-2 mb-sm-0">
                        <img
                            class="avatar-img rounded-circle"
                            src="/booking_v/assets/01-7N0KytgQ.jpg"
                            alt=""
                        />
                    </div>
                    <h4 class="mb-2 mb-sm-0 ms-sm-3">
                        <span class="fw-light">Hi</span> Jacqueline Miller
                    </h4>
                </div>
                <button class="btn btn-md btn-primary w-100 d-block d-xl-none mt-2" type="button">
                    <svg
                        width="24px"
                        height="24px"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        role="img"
                        focusable="false"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
                        ></path>
                    </svg>
                    Dashboard Menu
                </button>
                <div class="navbar navbar-expand-xl d-xl-block d-none">
                    <ul class="navbar-nav navbar-offcanvas-menu d-flex justify-content-between">
                        <li class="nav-item">
                            <router-link
                                to="/booking_v/agent/dashboard"
                                class="router-link-active router-link-exact-active nav-link active"
                                style="font-weight: 400; font-size: 14px"
                            >
                                <svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"
                                    ></path>
                                </svg>
                                Dashboard
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a
                                href="/booking_v/agent/listings"
                                class="nav-link"
                                style="font-weight: 400; font-size: 14px"
                                ><svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2"
                                    ></path>
                                    <path
                                        d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0"
                                    ></path>
                                </svg>
                                Listings</a
                            >
                        </li>
                        <li class="nav-item">
                            <route-link
                                to="#/company/bookings/index"
                                class="nav-link"
                                style="font-weight: 400; font-size: 14px"
                                ><svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z"
                                    ></path>
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"
                                    ></path>
                                </svg>
                                Bookings</route-link
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                href="/booking_v/agent/activities"
                                class="nav-link"
                                style="font-weight: 400; font-size: 14px"
                                ><svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"
                                    ></path>
                                </svg>
                                Activities</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                href="/booking_v/agent/earnings"
                                class="nav-link"
                                style="font-weight: 400; font-size: 14px"
                                ><svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"
                                    ></path>
                                </svg>
                                Earnings</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                href="/booking_v/agent/reviews"
                                class="nav-link"
                                style="font-weight: 400; font-size: 14px"
                                ><svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"
                                    ></path>
                                </svg>
                                Reviews</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                href="/booking_v/agent/settings"
                                class="nav-link"
                                style="font-weight: 400; font-size: 14px"
                                ><svg
                                    width="14px"
                                    height="14px"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    role="img"
                                    focusable="false"
                                    class="fa-fw mb-1"
                                >
                                    <path
                                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"
                                    ></path>
                                    <path
                                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"
                                    ></path>
                                </svg>
                                Settings</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
<style>
.nav-link {
    color: black;
}
</style>
