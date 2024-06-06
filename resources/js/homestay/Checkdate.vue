<template>
    <div>
        <div
            class="modal fade"
            id="bookingConfirmationModal"
            tabindex="-1"
            aria-labelledby="bookingConfirmationModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content custom-modal-width" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingConfirmationModalLabel">
                            Xác nhận đặt phòng
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form-check></form-check>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="closeModal('bookingConfirmationModal')"
                        >
                            Hủy
                        </button>
                        <button type="button" class="btn btn-primary" @click="">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card w-100" style="margin-top: 100px">
                <h6 class="text-uppercase font-weight-bolder m-4">Tra cứu ngày</h6>

                <div class="mt-2 mb-2">
                    <div class="row justify-content-around">
                        <div class="col-lg-5">
                            <input
                                class="input__field"
                                type="date"
                                v-model="star_day"
                                @focus="isFocused = true"
                                @blur="isFocused = false"
                            />
                            <span class="input__label">Ngày nhận phòng</span>
                        </div>
                        <div class="col-lg-5">
                            <input
                                class="input__field"
                                type="date"
                                v-model="close_day"
                                @focus="isFocused = true"
                                @blur="isFocused = false"
                            />
                            <span class="input__label">Ngày trả phòng</span>
                        </div>
                        <div class="col-md-5 mt-4">
                            <div
                                class="form-border-bottom d-flex align-items-center"
                                ref="dropdownContainer"
                            >
                                <div class="w-100">
                                    <div class="dropdown me-2">
                                        <input
                                            type="text"
                                            class="form-guest-selector selection-result show input__field"
                                            data-bs-auto-close="outside"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="true"
                                            :value="displayOccupants"
                                            @click="toggleDropdown"
                                        />
                                        <span class="input__label">Khách hàng</span>
                                        <ul
                                            class="dropdown-menu guest-selector-dropdown w-100"
                                            :class="{ show: isDropdownVisible }"
                                            data-popper-placement="top-start"
                                        >
                                            <li class="row d-flex justify-content-between">
                                                <div>
                                                    <h6 class="mt-2" style="margin-left: 30px">
                                                        Adults
                                                    </h6>
                                                </div>
                                                <div
                                                    class="row align-items-center"
                                                    style="margin-right: 10px"
                                                >
                                                    <button
                                                        class="btn btn-md btn-link"
                                                        @click="decreaseCount('adults')"
                                                    >
                                                        <svg
                                                            width="1em"
                                                            height="1em"
                                                            viewBox="0 0 16 16"
                                                            fill="currentColor"
                                                            role="img"
                                                            focusable="false"
                                                            class="fs-5 fa-fw"
                                                        >
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                                            ></path>
                                                            <path
                                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                    <h6 class="guest-selector-count mb-0">
                                                        {{ adults }}
                                                    </h6>
                                                    <button
                                                        class="btn btn-md btn-link"
                                                        @click="increaseCount('adults')"
                                                    >
                                                        <svg
                                                            width="1em"
                                                            height="1em"
                                                            viewBox="0 0 16 16"
                                                            fill="currentColor"
                                                            role="img"
                                                            focusable="false"
                                                            class="fs-5 fa-fw"
                                                        >
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                                            ></path>
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </li>
                                            <li class="dropdown-divider"></li>
                                            <li class="row d-flex justify-content-between">
                                                <div>
                                                    <h6 class="mt-2" style="margin-left: 30px">
                                                        Children
                                                    </h6>
                                                </div>
                                                <div
                                                    class="row align-items-center"
                                                    style="margin-right: 10px"
                                                >
                                                    <button
                                                        class="btn btn-md btn-link"
                                                        @click="decreaseCount('children')"
                                                    >
                                                        <svg
                                                            width="1em"
                                                            height="1em"
                                                            viewBox="0 0 16 16"
                                                            fill="currentColor"
                                                            role="img"
                                                            focusable="false"
                                                            class="fs-5 fa-fw"
                                                        >
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                                            ></path>
                                                            <path
                                                                d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                    <h6 class="guest-selector-count mb-0">
                                                        {{ children }}
                                                    </h6>
                                                    <button
                                                        class="btn btn-md btn-link"
                                                        @click="increaseCount('children')"
                                                    >
                                                        <svg
                                                            width="1em"
                                                            height="1em"
                                                            viewBox="0 0 16 16"
                                                            fill="currentColor"
                                                            role="img"
                                                            focusable="false"
                                                            class="fs-5 fa-fw"
                                                        >
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                                            ></path>
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5"></div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button
                        class="btn border-0 m-2"
                        @click="check"
                        :disabled="loading"
                        style="
                            background-color: rgb(240 181 145 / 50%);
                            color: #ef7d4ae6;
                            width: 250px;
                            border-radius: 10px;
                        "
                    >
                        <span v-if="!loading">Tra cứu ngày</span>
                        <span v-if="loading">
                            <i class="fas fa-circle-notch fa-spin"></i> Checking...
                        </span>
                    </button>
                </div>
            </div>

            <div class="card bg-transparent border-0" style="margin-top: 50px">
                <div class="card-header border-bottom bg-transparent px-0 pt-0">
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h3 class="mb-2 mb-sm-0 font-weight-bold">Đặt phòng</h3>
                        <div class="col-sm-6 p-0"></div>
                    </div>
                </div>
                <div class="card-body pt-4 p-0">
                    <div
                        class="card p-3"
                        v-for="(room, index) in rooms"
                        :key="index"
                        style="width: 400px"
                    >
                        <div class="row g-4">
                            <div class="col-md-3 position-relative">
                                <img
                                    :src="room.image"
                                    alt="..."
                                    width="100px"
                                    style="border-radius: 15px"
                                />
                            </div>
                            <div class="col-md-9">
                                <div
                                    class="card-body d-flex flex-column h-100"
                                    style="
                                        padding-left: 10px;
                                        padding-top: 0px;
                                        padding-bottom: 0px;
                                    "
                                >
                                    <h5 class="card-title">
                                        <a href="#">{{ room.title }}</a>
                                    </h5>

                                    <!---->
                                    <div class="row align-items-center" style="margin-right: 10px">
                                        <button class="btn btn-md btn-link">
                                            <svg
                                                width="1em"
                                                height="1em"
                                                viewBox="0 0 16 16"
                                                fill="currentColor"
                                                role="img"
                                                focusable="false"
                                                class="fs-5 fa-fw"
                                                @click="decreaseCount('count', index)"
                                            >
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                                ></path>
                                                <path
                                                    d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"
                                                ></path>
                                            </svg>
                                        </button>
                                        <h6 class="guest-selector-count mb-0">{{ room.count }}</h6>
                                        <button class="btn btn-md btn-link">
                                            <svg
                                                width="1em"
                                                height="1em"
                                                viewBox="0 0 16 16"
                                                fill="currentColor"
                                                role="img"
                                                focusable="false"
                                                class="fs-5 fa-fw"
                                                @click="increaseCount('count', index)"
                                            >
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                                ></path>

                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div
                                        class="d-sm-flex justify-content-sm-between align-items-center mt-auto"
                                    >
                                        <div class="d-flex align-items-center">
                                            <h5 class="fw-bold mb-0 me-1">{{ room.price }}</h5>
                                            <span class="mb-0 me-2">/day</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button
                        class="btn border-0 m-2"
                        @click="showBookingConfirmationModal"
                        :disabled="loading"
                        style="
                            background-color: rgb(240 181 145 / 50%);
                            color: #ef7d4ae6;
                            width: 500px;
                            height: 50px;
                            border-radius: 10px;
                        "
                    >
                        <span v-if="!loading">Đặt phòng</span>
                        <span v-if="loading">
                            <i class="fas fa-circle-notch fa-spin"></i> Checking...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Modal } from 'bootstrap';
import FormCheck from '@/homestay/FormCheck.vue';

export default {
    components: {
        FormCheck,
    },
    data() {
        return {
            isDropdownVisible: false,
            adults: 1,
            children: 0,
            rooms: [
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Luxury Room with Balcony',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen'],
                    count: 0,
                    price: '$750',

                    cancellation: null,
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Luxury Room with Balcony',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen'],
                    price: '$750',
                    count: 0,

                    cancellation: 'Free Cancellation till 7 Jan 2022',
                },
            ],
            quantity: 1,
            minValue: 1,
            maxValue: 10, // Thay đổi giá trị tối đa nếu cần,
            star_day: null,
            close_day: null,
            loading: false,
            check: false,
        };
    },
    computed: {
        displayOccupants() {
            return `${this.adults} Adults, ${this.children} Children `;
        },
    },
    methods: {
        toggleDropdown() {
            this.isDropdownVisible = !this.isDropdownVisible;
        },
        closeDropdown() {
            this.isDropdownVisible = false;
        },
        decreaseCount(type, index = null) {
            if (type === 'adults' && this.adults > 0) {
                this.adults--;
            } else if (type === 'children' && this.children > 0) {
                this.children--;
            } else if (type === 'count' && index !== null && this.rooms[index].count > 0) {
                this.rooms[index].count--;
            }
        },
        increaseCount(type, index = null) {
            if (type === 'adults') {
                this.adults++;
            } else if (type === 'children') {
                this.children++;
            } else if (type === 'count' && index !== null) {
                this.rooms[index].count++;
            }
        },
        handleClickOutside(event) {
            const dropdownContainer = this.$refs.dropdownContainer;
            if (!dropdownContainer.contains(event.target)) {
                this.closeDropdown();
            }
        },
        showBookingConfirmationModal() {
            const modal = new Modal(document.getElementById('bookingConfirmationModal'));
            modal.show();
        },
        closeModal(modalId) {
            const modal = Modal.getInstance(document.getElementById(modalId));
            modal.hide();
        },
    },
    mounted() {
        document.addEventListener('click', this.handleClickOutside);
    },
    beforeUnmount() {
        document.removeEventListener('click', this.handleClickOutside);
    },
};
</script>

<style scoped>
label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
}

.dropdown-menu {
    position: absolute;
    inset: auto auto 0px 0px;
    margin: 0px;
    transform: translate3d(0px, -47.1111px, 0px);
}

.guest-selector-count {
    margin-bottom: 0;
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
    border-radius: 10px;
}

.input__field:focus + .input__label,
.input__field:not(:placeholder-shown) + .input__label {
    top: -10px; /* Điều chỉnh vị trí khi input field được focus */
    font-size: 12px; /* Điều chỉnh kích thước chữ khi input field được focus */
    color: #333; /* Đổi màu chữ khi input field được focus */
}
.dropdown-menu.show {
    display: block;
}
</style>
