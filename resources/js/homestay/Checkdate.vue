<template>
    <div>
        <div class="card shawdow w-100">
            <h6 class="text-uppercase text-secondary font-weight-bolder">Check Availability</h6>

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
                    <div class="col-md-5">
                        <label class="small">Occupant</label>
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

            <button class="btn btn-secondary btn-block" @click="check" :disabled="loading">
                <span v-if="!loading">Check!</span>
                <span v-if="loading">
                    <i class="fas fa-circle-notch fa-spin"></i> Checking...
                </span>
            </button>
        </div>

        <div class="card bg-transparent border-0" style="margin-top: 50px">
            <div class="card-header border-bottom bg-transparent px-0 pt-0">
                <div class="d-sm-flex justify-content-sm-between align-items-center">
                    <h3 class="mb-2 mb-sm-0 font-weight-bold">Booking Room</h3>
                    <div class="col-sm-6 p-0"></div>
                </div>
            </div>
            <div class="card-body pt-4 p-0">
                <div
                    class="card shadow p-3"
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
                                style="padding-left: 10px; padding-top: 0px; padding-bottom: 0px"
                            >
                                <h5 class="card-title">
                                    <a href="#">{{ room.title }}</a>
                                </h5>

                                <!---->

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
        </div>
    </div>
</template>

<script>
export default {
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
                    price: '$750',

                    cancellation: null,
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Luxury Room with Balcony',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen'],
                    price: '$750',

                    cancellation: 'Free Cancellation till 7 Jan 2022',
                },
            ],
            quantity: 1,
            minValue: 1,
            maxValue: 10, // Thay đổi giá trị tối đa nếu cần
        };
    },
    computed: {
        displayOccupants() {
            return `${this.adults} Adults, ${this.children} Children`;
        },
    },
    methods: {
        toggleDropdown() {
            this.isDropdownVisible = !this.isDropdownVisible;
        },
        closeDropdown() {
            this.isDropdownVisible = false;
        },
        decreaseCount(type) {
            if (type === 'adults' && this.adults > 1) {
                this.adults--;
            } else if (type === 'children' && this.children > 0) {
                this.children--;
            }
        },
        increaseCount(type) {
            if (type === 'adults') {
                this.adults++;
            } else if (type === 'children') {
                this.children++;
            }
        },
        handleClickOutside(event) {
            const dropdownContainer = this.$refs.dropdownContainer;
            if (!dropdownContainer.contains(event.target)) {
                this.closeDropdown();
            }
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
