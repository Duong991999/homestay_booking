<template>
    <div class="card" style="margin: 20px; border-radius: 8px; width: 90%">
        <div class="card-body">
            <div class="row">
                <a :href="$router.resolve({ name: 'bookable', params: { id } }).href"
                    >link
                    <img style="width: 240px; height: 240px; border-radius: 8px" :src="imageUrl" />
                </a>
                <div class="col-sm-8 d-flex flex-column" style="margin-left: 30px">
                    <div class="row d-flex justify-content-between">
                        <div>
                            <a
                                class="font-weight-bold"
                                href="#"
                                style="text-decoration: none; font-size: 20px; color: black"
                                @click.prevent="navigateToBookable"
                                >Homestay</a
                            >
                            <star-rating
                                class="mb-2"
                                v-model="review.rating"
                                style="color: #ffd700; margin-top: 4px"
                            ></star-rating>
                            <div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-geo-alt-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"
                                    />
                                </svg>
                                <h class="localtion" style="color: black; font-size: 14px">{{
                                    location
                                }}</h>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div>
                                    <h class="font-weight-bold"> Rất tốt</h>
                                    <br />
                                    <h>34 views</h>
                                </div>
                                <div
                                    class="bg-primary ml-2 d-flex align-items-center justify-content-center rounded-right rounded-top"
                                    style="
                                        background-color: blue;
                                        margin-left: 8px;
                                        width: 40px;
                                        height: 40px;
                                        border-radius: 20px;
                                    "
                                >
                                    <h class="font-weight-bold" style="color: aliceblue">5.5</h>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="row d-flex justify-content-between"
                        style="margin-top: 10px; padding-left: 10px; border-left: 2px solid black"
                    >
                        <h>Tiện ích</h>

                        <div>
                            <h class="font-weight-bold">Giá mỗi đêm</h><br />
                            <h3 class="font-weight-bold" style="color: red">{{ price }}VNĐ</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        id: Number,
        location: { type: String, default: 'Hà Nội' },
        imageUrl: {
            type: String,
            default: 'assets/image/slide_home_screens/_2.jpg',
        },
        review: {
            type: Object,
            default: () => ({ rating: 0 }),
        },
        price: {
            type: Number,
            default: '554.43',
        },
    },
    methods: {
        navigateToBookable() {
            this.$router.push({ name: 'bookable', params: { id: this.id } });
        },
    },
};
</script>

<style scoped></style>
