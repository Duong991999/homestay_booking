<template>
    <div>
        <!-- Booking Modal -->
        <div
            class="modal fade"
            id="bookingModal"
            tabindex="-1"
            aria-labelledby="bookingModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bookingModalLabel">Thông tin đặt phòng</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên homestay</label>
                            <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                {{ selectedBooking.name }}
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="start_day" class="form-label d-block">Ngày bắt đầu</label>
                                <div class="">
                                    <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                        {{ selectedBooking.date }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="close_day" class="form-label d-block">Ngày kết thúc</label>
                                <div class="">
                                    <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                        {{ selectedBooking.date }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Ngày đặt</label>
                            <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                {{ selectedBooking.date }}
                            </h6>
                        </div>
                        <div v-for="room in rooms" :key="room.id">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label d-block">Loại phòng</label>
                                    <div class="">
                                        <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                            {{ room.type }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label d-block">Số lượng phòng</label>
                                    <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                        {{ room.count }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div :class="`bg-${selectedBooking.statusColor} badge`">
                                {{ selectedBooking.status }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="closeModal"
                            aria-label="Close"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rating Modal -->
        <div
            class="modal fade"
            id="ratingModal"
            tabindex="-1"
            aria-labelledby="ratingModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ratingModalLabel">Đánh giá</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input
                                type="number"
                                class="form-control form-control-lg"
                                style="border-radius: 10px"
                                v-model="rating"
                                min="1"
                                max="5"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Review</label>
                            <textarea
                                class="form-control form-control-lg"
                                style="border-radius: 10px"
                                v-model="review"
                            ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="closeRatingModal"
                            aria-label="Close"
                        >
                            Close
                        </button>
                        <button type="button" class="btn btn-primary" @click="submitRating">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border w-100">
                    <div class="card-header border-bottom">
                        <h5 class="card-header-title">
                            Đơn đặt phòng của tôi
                            <span class="badge bg-primary bg-opacity-10 text-primary ms-2"
                                >{{ filteredBookings.length }} Đơn
                            </span>
                        </h5>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row g-3 align-items-center justify-content-between mb-3">
                            <div class="col-md-8">
                                <form class="rounded position-relative">
                                    <input
                                        class="form-control pe-5"
                                        type="search"
                                        placeholder="Search"
                                        aria-label="Search"
                                    />
                                    <button
                                        class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y"
                                        type="submit"
                                    >
                                        <svg
                                            class="svg-inline--fa fa-magnifying-glass"
                                            aria-hidden="true"
                                            focusable="false"
                                            data-prefix="fas"
                                            data-icon="magnifying-glass"
                                            role="img"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512"
                                        >
                                            <path
                                                fill="currentColor"
                                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                            ></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'All' }"
                                    @click="selectedTab = 'All'"
                                    >All</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Chờ duyệt' }"
                                    @click="selectedTab = 'Chờ duyệt'"
                                    >Chờ duyệt</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Đã duyệt' }"
                                    @click="selectedTab = 'Đã duyệt'"
                                    >Đã duyệt</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Hoàn thành' }"
                                    @click="selectedTab = 'Hoàn thành'"
                                    >Hoàn thành</a
                                >
                            </li>
                        </ul>

                        <div class="table-responsive border-0 mt-3">
                            <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">#</th>
                                        <th scope="col" class="border-0">Name</th>
                                        <th scope="col" class="border-0">Date</th>
                                        <th scope="col" class="border-0">Status</th>
                                        <th scope="col" class="border-0 rounded-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <tr v-for="(booking, index) in filteredBookings" :key="index">
                                        <td>
                                            <h6 class="mb-0">{{ index + 1 }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0">
                                                <a :href="booking.link">{{ booking.name }}</a>
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 fw-light">{{ booking.date }}</h6>
                                        </td>
                                        <td>
                                            <div :class="`bg-${booking.statusColor} badge`">
                                                {{ booking.status }}
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-light mb-0"
                                                @click.prevent="showModal(booking)"
                                                >View</a
                                            >
                                            <a
                                                v-if="booking.status === 'Hoàn thành'"
                                                href="#"
                                                class="btn btn-sm btn-primary mb-0"
                                                @click.prevent="showRatingModal(booking)"
                                                >Đánh giá</a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Modal } from 'bootstrap';

export default {
    data() {
        return {
            selectedBooking: {},
            selectedTab: 'All',
            rating: 0,
            review: '',
            bookings: [
                {
                    name: 'Deluxe Pool View',
                    date: 'Nov 22 - 25',
                    status: 'Đã duyệt',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Pool View with Breakfast',
                    date: 'Nov 24 - 28',
                    status: 'Đã duyệt',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Luxury Room with Balcony',
                    date: 'Nov 24 - 28',
                    status: 'Hoàn thành',
                    statusColor: 'info',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Room Twin Bed With Balcony',
                    date: 'Nov 28 - 30',
                    status: 'Đã duyệt',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
            ],
            rooms: [
                { id: 1, type: 'Vip-1', count: 6 },
                { id: 2, type: 'Deluxe', count: 10 },
                { id: 3, type: 'Standard', count: 15 },
            ],
        };
    },
    computed: {
        filteredBookings() {
            if (this.selectedTab === 'All') {
                return this.bookings;
            }
            return this.bookings.filter((booking) => booking.status === this.selectedTab);
        },
    },
    methods: {
        showModal(booking) {
            this.selectedBooking = booking;
            const modal = new Modal(document.getElementById('bookingModal'));
            modal.show();
        },
        closeModal() {
            const modal = Modal.getInstance(document.getElementById('bookingModal'));
            modal.hide();
        },
        showRatingModal(booking) {
            this.selectedBooking = booking;
            const modal = new Modal(document.getElementById('ratingModal'));
            modal.show();
        },
        closeRatingModal() {
            const modal = Modal.getInstance(document.getElementById('ratingModal'));
            modal.hide();
        },
        submitRating() {
            // Implement your submit rating logic here
            console.log(`Rating: ${this.rating}, Review: ${this.review}`);
            this.closeRatingModal();
        },
    },
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
