<template>
    <div class="card w-100 border-0">
        <div class="card-body">
            <router-link style="text-decoration: none" :to="{ name: 'bookable', params: { id } }">
                <a class="text-decoration-none">
                    <img
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px"
                        class="w-80 card-img-top"
                        :src="imageUrl"
                    />
                    <h5 class="font-weight-bold" style="color: black">Homestay</h5>
                </a>
            </router-link>
            <div class="row" style="margin-left: 0.1px">
                <star-rating
                    class="mb-2"
                    v-model="review.rating"
                    style="color: #ffd700; margin-top: 4px"
                ></star-rating>
                <div style="margin-left: 5px">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-geo-alt-fill"
                        viewBox="0 0 16 16"
                        style="margin-left: 5px"
                    >
                        <path
                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"
                        />
                    </svg>
                    <h class="localtion" style="color: blue">{{ location }}</h>
                </div>
            </div>
            <div>
                <a class="price" style="color: red">{{ price }}</a>
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
};
</script>

<style scoped></style>
