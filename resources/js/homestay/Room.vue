<template>
    <div class="card bg-transparent border-0 w-100" id="room-options" style="margin-top: 50px">
        <div class="card-header border-bottom bg-transparent px-0 pt-0">
            <div class="d-sm-flex justify-content-sm-between align-items-center">
                <h3 class="mb-2 mb-sm-0 font-weight-bold">Danh sách phòng</h3>
                <div class="col-sm-6 p-0"></div>
            </div>
        </div>
        <div class="card-body pt-4 p-0">
            <div class="card shadow p-3 w-100 m-0 mb-2" v-for="(room, index) in items" :key="index">
                <div class="row g-4">
                    <div class="col-md-5 position-relative">
                        <img
                            :src="
                                room?.files[0]?.file_path ??
                                'assets/image/slide_home_screens/_1.jpg'
                            "
                            alt="..."
                            width="200px"
                            style="border-radius: 15px"
                        />
                    </div>
                    <div class="col-md-7">
                        <div
                            class="card-body d-flex flex-column"
                            style="padding-left: 10px; padding-top: 0px; padding-bottom: 0px"
                        >
                            <h5 class="card-title">
                                <a href="#">{{ room.name }}</a>
                            </h5>
                            <ul class="nav nav-divider mb-2">
                                <!-- <li
                                    class="nav-item"
                                    v-for="(feature, index) in room.features"
                                    :key="index"
                                >
                                    {{ feature }}
                                </li> -->
                                <li class="nav-item">
                                    <a href="#" class="mb-0 text-primary">More+</a>
                                </li>
                            </ul>
                            <p v-if="room.cancellation" class="text-success mb-0">
                                {{ room.cancellation }}
                            </p>
                            <div
                                class="d-sm-flex justify-content-sm-between align-items-center mt-auto"
                            >
                                <div class="d-flex align-items-center">
                                    <h5 class="fw-bold mb-0 me-1">{{ room.price }}</h5>
                                    <span class="mb-0 me-2">/ngày</span>
                                    <span class="text-decoration-line-through mb-0">{{
                                        room.originalPrice
                                    }}</span>
                                </div>
                                <div class="mt-3 mt-sm-0">
                                    <button
                                        type="button"
                                        class="btn btn-link text-decoration-none p-0 mb-0 mt-1"
                                        @click="showModal(room)"
                                    >
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            fill="currentColor"
                                            role="img"
                                            focusable="false"
                                            class="me-1"
                                            style="margin-bottom: 2px"
                                        >
                                            <path
                                                d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"
                                            ></path>
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"
                                            ></path>
                                        </svg>
                                        Xem phòng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div
                class="modal fade"
                id="detailsModal"
                tabindex="-1"
                aria-labelledby="detailsModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsModalLabel">
                                {{ modalRoom?.name }}
                            </h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img
                                :src="modalRoom?.files[0]?.file_path"
                                alt="..."
                                class="img-fluid mb-3"
                            />
                            <p><strong>Features:</strong></p>
                            <ul>
                                <li
                                    v-for="(feature, index) in modalRoom?.features ?? []"
                                    :key="index"
                                >
                                    {{ feature }}
                                </li>
                            </ul>
                            <p v-if="modalRoom?.cancellation ?? false" class="text-success">
                                {{ modalRoom?.cancellation }}
                            </p>
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
            selectedRoom: null,
            roomOptions: ['Vip', 'No Vip'],
            rooms: [
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Luxury Room with Balcony',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen'],
                    price: '$750',
                    originalPrice: '$1000',
                    cancellation: null,
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Luxury Room with Balcony',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen'],
                    price: '$750',
                    originalPrice: '$1000',
                    cancellation: 'Free Cancellation till 7 Jan 2022',
                },
            ],
            modalRoom: null,
        };
    },
    props: {
        items: {
            type: Array,
        },
    },
    methods: {
        showModal(room) {
            this.modalRoom = room;
            console.log(this.modalRoom?.files[0]?.file_path);
            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        },
    },
};
</script>

<style>
.card {
    margin: 0;
    border-radius: 15px;
    margin-bottom: 20px;
}
.nav-item {
    font-size: 13px;
}
.nav-divider .nav-item + .nav-item:before {
    content: '•';
    padding: 0 0.7rem;
    opacity: 0.8;
}
</style>
