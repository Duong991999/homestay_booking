<template>
    <div>
        <!-- Modal -->
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
                            <label for="name" class="form-label">Khách hàng </label>
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
                                        {{ selectedBooking.checkIn }}
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
                                        {{ selectedBooking.checkOut }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Ngày đặt</label>
                            <h6 class="form-control form-control-lg" style="border-radius: 10px">
                                {{ selectedBooking.bookingDate }}
                            </h6>
                        </div>

                        <div v-for="room in selectedBooking.rooms" :key="room.id">
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
                            @click="closeModal"
                            aria-label="Close"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for Delete Confirmation -->
        <div
            class="modal fade"
            id="deleteModal"
            tabindex="-1"
            aria-labelledby="deleteModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa đặt phòng này không?</p>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            @click="closeModal('deleteModal')"
                            aria-label="Close"
                        >
                            Hủy
                        </button>
                        <button type="button" class="btn btn-danger" @click="deleteBooking">
                            Xóa
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
                            Đặt phòng
                            <span class="badge bg-primary bg-opacity-10 text-primary ms-2"
                                >{{ filteredBookings.length }} Đơn
                            </span>
                        </h5>
                    </div>
                    <div class="card-body" style="padding: 2rem">
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
                                    :class="{ active: selectedTab === 'All' }"
                                    @click="selectedTab = 'All'"
                                    >All</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Booked' }"
                                    @click="selectedTab = 'Booked'"
                                    >Booked</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    :class="{ active: selectedTab === 'Reserved' }"
                                    @click="selectedTab = 'Reserved'"
                                    >Reserved</a
                                >
                            </li>
                        </ul>

                        <div class="table-responsive border-0 mt-3">
                            <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="border-0 rounded-start">#</th>
                                        <th scope="col" class="border-0">Tên khách</th>
                                        <th scope="col" class="border-0">Ngày đặt</th>
                                        <th scope="col" class="border-0">Ngày bắt đầu</th>
                                        <th scope="col" class="border-0">Ngày kết thúc</th>
                                        <th scope="col" class="border-0">Loại phòng</th>
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
                                            <h6 class="p-2 mb-0 fw-light">
                                                {{ booking.bookingDate }}
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="p-2 mb-0 fw-light">{{ booking.checkIn }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="p-2 mb-0 fw-light">
                                                {{ booking.checkOut }}
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="p-2 mb-0 fw-light">
                                                {{ booking.roomType }}
                                            </h6>
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
                                            <button
                                                href="#"
                                                class="btn btn-sm btn-light p-2 ml-2"
                                                style="border-radius: 10px"
                                                @click.prevent="showModal(booking)"
                                            >
                                                <img src="assets/image/icon/eye.png  " width="20" />
                                            </button>
                                            <button
                                                href="#"
                                                class="btn p-2 ml-2"
                                                style="
                                                    border-radius: 10px;
                                                    background-color: #69eb67;
                                                "
                                                @click.prevent="showModal(booking)"
                                            >
                                                <img
                                                    src="assets/image/icon/file.png  "
                                                    width="20"
                                                />
                                            </button>
                                            <button
                                                href="#"
                                                class="btn btn-sm btn-danger p-2 ml-2"
                                                style="
                                                    border-radius: 10px;
                                                    background-color: #ff5050;
                                                "
                                                @click.prevent="showDeleteModal(booking)"
                                            >
                                                <img src="assets/image/icon/bin.png  " width="20" />
                                            </button>
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
            bookings: [
                {
                    name: 'Deluxe Pool View',
                    bookingDate: 'Nov 22',
                    checkIn: 'Nov 22',
                    checkOut: 'Nov 25',
                    roomType: 'Deluxe',
                    status: 'Booked',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                    rooms: [{ id: 1, type: 'Deluxe', count: 1 }],
                },
                {
                    name: 'Deluxe Pool View with Breakfast',
                    bookingDate: 'Nov 24',
                    checkIn: 'Nov 24',
                    checkOut: 'Nov 28',
                    roomType: 'Deluxe',
                    status: 'Booked',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                    rooms: [{ id: 2, type: 'Deluxe', count: 1 }],
                },
                {
                    name: 'Luxury Room with Balcony',
                    bookingDate: 'Nov 24',
                    checkIn: 'Nov 24',
                    checkOut: 'Nov 28',
                    roomType: 'Luxury',
                    status: 'Reserved',
                    statusColor: 'info',
                    link: '/booking_v/agent/bookings',
                    rooms: [{ id: 3, type: 'Luxury', count: 1 }],
                },
                {
                    name: 'Deluxe Room Twin Bed With Balcony',
                    bookingDate: 'Nov 28',
                    checkIn: 'Nov 28',
                    checkOut: 'Nov 30',
                    roomType: 'Deluxe',
                    status: 'Booked',
                    statusColor: 'success',
                    link: '/booking_v/agent/bookings',
                    rooms: [{ id: 4, type: 'Deluxe', count: 1 }],
                },
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
        showDeleteModal(booking) {
            this.selectedBooking = booking;
            const modal = new Modal(document.getElementById('deleteModal'));
            modal.show();
        },
        deleteBooking() {
            this.bookings = this.bookings.filter((booking) => booking !== this.selectedBooking);
            this.closeModal('deleteModal');
        },
    },
};
</script>

<style scoped>
/* Add any custom styles here */
</style>
