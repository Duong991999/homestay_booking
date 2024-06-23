<template>
    <div class="col-12" style="margin-top: 150px">
        <div class="card border w-100">
            <div class="card-header border-bottom row d-flex justify-content-between m-0">
                <h5 class="card-header-title">
                    My Listings
                    <span class="badge bg-opacity-10 ms-2">{{ listings.length }} Items</span>
                </h5>
                <button
                    class="btn btn-primary p-2 mb-0"
                    @click="showAddForm = true"
                    style="border-radius: 10px"
                >
                    Thêm Homestay
                </button>
            </div>
            <div class="card-body">
                <div
                    v-for="(listing, index) in listings"
                    :key="index"
                    class="card border w-100 m-0"
                >
                    <div class="row g-4">
                        <div class="col-md-3 col-lg-2">
                            <img
                                :src="listing.image"
                                class="card-img rounded-2 m-2"
                                alt="Card image"
                            />
                        </div>
                        <div class="col-lg-10" ms="9">
                            <div class="card-body position-relative d-flex flex-column p-0 h-100">
                                <div
                                    class="btn-group list-inline-item position-absolute top-0 end-0"
                                ></div>
                                <h5 class="card-title mb-0 mt-2 me-5">
                                    <a href="#" class="">{{ listing.title }}</a>
                                </h5>
                                <small>
                                    <svg
                                        width="1em"
                                        height="1em"
                                        viewBox="0 0 16 16"
                                        fill="currentColor"
                                        role="img"
                                        focusable="false"
                                        class="me-1 mb-1"
                                    >
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"
                                        ></path>
                                        <path
                                            d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"
                                        ></path>
                                    </svg>
                                    {{ listing.address }}
                                </small>
                                <div
                                    class="d-sm-flex justify-content-sm-between align-items-center mb-2 mt-md-auto"
                                >
                                    <div class="d-flex align-items-center">
                                        <h5 class="fw-bold mb-0 me-1">${{ listing.price }}</h5>
                                        <span class="mb-0 me-2">/day</span>
                                    </div>
                                    <div class=" " style="margin-right: 20px">
                                        <button
                                            class="btn btn-sm btn-success p-2 mb-0 mr-2"
                                            type="button"
                                            style="border-radius: 10px"
                                        >
                                            <svg
                                                width="20px"
                                                height="20px"
                                                viewBox="0 0 16 16"
                                                fill="currentColor"
                                                role="img"
                                                focusable="false"
                                                class="fa-fw mb-1"
                                            >
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                                ></path>
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"
                                                ></path>
                                            </svg>
                                            Sửa
                                        </button>
                                        <button
                                            class="btn btn-sm btn-danger p-2 mb-0"
                                            type="button"
                                            style="border-radius: 10px"
                                        >
                                            <svg
                                                width="20px"
                                                height="20px"
                                                viewBox="0 0 16 16"
                                                fill="currentColor"
                                                role="img"
                                                focusable="false"
                                                class="fa-fw mb-1"
                                            >
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"
                                                ></path>
                                            </svg>
                                            Xóa
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            listings: [
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Pride moon Village Resort & Spa',
                    address: '31J W Spark Street, California - 24578',
                    price: 1586,
                },
            ],
        };
    },
};
</script>
