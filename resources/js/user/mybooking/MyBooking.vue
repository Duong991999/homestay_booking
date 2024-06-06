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
                            <label for="name" class="form-label">Tên homestay </label>
                            <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                {{ selectedBooking.name }}
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="start_day" class="form-label d-block"
                                    >Ngày bắt đầu</label
                                >
                                <div class="">
                                    <h6
                                        class="form-control form-control-lg"
                                        style="border-radius: 10px"
                                    >
                                        {{ selectedBooking.date }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="close_day" class="form-label d-block"
                                    >Ngày kết thúc</label
                                >
                                <div class="">
                                    <h6
                                        class="form-control form-control-lg"
                                        style="border-radius: 10px"
                                    >
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
                                        <h6
                                            class="form-control form-control-lg"
                                            style="border-radius: 10px"
                                        >
                                            {{ room.type }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label d-block">Số lượng phòng</label>
                                    <h6
                                        class="form-control form-control-lg"
                                        style="border-radius: 10px"
                                    >
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
                            @click="closeModal('bookingModal')"
                            aria-label="Close"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Review Modal -->
        <div
            class="modal fade"
            id="reviewModal"
            tabindex="-1"
            aria-labelledby="reviewModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Đánh giá homestay</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Nhận xét</label>
                            <textarea
                                id="comment"
                                class="form-control"
                                v-model="reviewComment"
                                rows="4"
                                style="border-radius: 10px"
                            ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="closeModal('reviewModal')"
                            aria-label="Close"
                        >
                            Hủy
                        </button>
                        <button type="button" class="btn btn-primary" @click="submitReview">
                            Gửi đánh giá
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
                            <div class="col-md-8 row">
                                <form class="position-relative col-md-10">
                                    <input
                                        class="form-control pe-5"
                                        type="search"
                                        placeholder="Search"
                                        aria-label="Search"
                                        style="height: 40px; border-radius: 10px"
                                    />
                                </form>
                                <button
                                    class="btn px-3 col-md-2"
                                    type="submit"
                                    style="
                                        background-color: antiquewhite;
                                        color: #ff5050;
                                        border-radius: 10px;
                                    "
                                >
                                    Tìm Kiếm
                                </button>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'All ' }"
                                    @click="selectedTab = 'All'"
                                    >Tất cả</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Reserved' }"
                                    @click="selectedTab = 'Reserved'"
                                    >Chờ xử lý</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Booked' }"
                                    @click="selectedTab = 'Booked'"
                                    >Thành công</a
                                >
                            </li>

                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Completed' }"
                                    @click="selectedTab = 'Completed'"
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
                                            <h6 class="p-2 mb-0">{{ index + 1 }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="p-2 mb-0">
                                                <a :href="booking.link">{{ booking.name }}</a>
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="p-2 mb-0 fw-light">{{ booking.date }}</h6>
                                        </td>
                                        <td>
                                            <div
                                                class="m-2"
                                                :class="`bg-${booking.statusColor} badge`"
                                            >
                                                {{ booking.status }}
                                            </div>
                                        </td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-light p-2 ml-2"
                                                style="border-radius: 10px"
                                                @click.prevent="showModal(booking)"
                                                ><img src="assets/image/icon/eye.png  " width="20"
                                            /></a>
                                            <a
                                                v-if="booking.status === 'Completed'"
                                                href="#"
                                                class="btn btn-sm btn-warning p-2 ml-2"
                                                style="border-radius: 10px"
                                                @click.prevent="showReviewModal(booking)"
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
            reviewComment: '',
            selectedTab: 'All',
            bookings: [
                {
                    name: 'Deluxe Pool View',
                    date: 'Nov 22 - 25',
                    status: 'Booked',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Pool View with Breakfast',
                    date: 'Nov 24 - 28',
                    status: 'Booked',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Luxury Room with Balcony',
                    date: 'Nov 24 - 28',
                    status: 'Reserved',
                    statusColor: 'info',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Deluxe Room Twin Bed With Balcony',
                    date: 'Nov 28 - 30',
                    status: 'Booked',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                },
                {
                    name: 'Ocean View Suite',
                    date: 'Dec 1 - 5',
                    status: 'Completed',
                    statusColor: 'secondary',
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
        closeModal(modalId) {
            const modal = Modal.getInstance(document.getElementById(modalId));
            modal.hide();
        },
        showReviewModal(booking) {
            this.selectedBooking = booking;
            this.reviewComment = '';
            const modal = new Modal(document.getElementById('reviewModal'));
            modal.show();
        },
        submitReview() {
            // Handle the review submission logic here
            console.log(`Review for ${this.selectedBooking.name}: ${this.reviewComment}`);
            this.closeModal('reviewModal');
        },
    },
};
</script>
