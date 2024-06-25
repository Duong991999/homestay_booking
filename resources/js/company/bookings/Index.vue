<template>
    <div class="row" style="margin-top: 100px">
        <div class="col-12">
            <div class="card border w-100">
                <div class="card-header border-bottom">
                    <h5 class="card-header-title">
                        Đặt phòng
                        <span class="badge bg-opacity-10 text-primary ms-2">20 Đơn</span>
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
                    <ul class="nav nav-tabs mb-2">
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
                                :class="{ active: selectedTab === 'Duyệt' }"
                                @click="selectedTab = 'Duyệt'"
                                >Duyệt</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Nhận phòng' }"
                                @click="selectedTab = 'Nhận phòng'"
                                >Nhận phòng</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Trả phòng' }"
                                @click="selectedTab = 'Trả phòng'"
                                >Trả phòng</a
                            >
                        </li>
                    </ul>
                    <div class="table-responsive border-0">
                        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">#</th>
                                    <th scope="col" class="border-0">Khách</th>
                                    <th scope="col" class="border-0">Ngày đặt</th>
                                    <th scope="col" class="border-0">Ngày nhận phòng</th>
                                    <th scope="col" class="border-0">Ngày trả phòng</th>
                                    <th scope="col" class="border-0">Trạng thái</th>
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
                                            <a :href="booking.link">{{ booking.guest }}</a>
                                        </h6>
                                    </td>
                                    <td>{{ booking.date }}</td>
                                    <td>
                                        <h6 class="mb-0 fw-light">{{ booking.checkin }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 fw-light">{{ booking.checkout }}</h6>
                                    </td>
                                    <td>
                                        <div :class="`bg-${statusColors[booking.status]} badge`">
                                            {{ booking.status }}
                                        </div>
                                    </td>
                                    <td>
                                        <template v-if="selectedTab === 'Chờ duyệt'">
                                            <button
                                                @click="viewBooking(booking)"
                                                class="btn btn-sm btn-light mb-1"
                                            >
                                                View
                                            </button>
                                            <button
                                                @click="approveBooking(booking)"
                                                class="btn btn-sm btn-success"
                                            >
                                                Duyệt
                                            </button>
                                            <button
                                                @click="cancelBooking(booking)"
                                                class="btn btn-sm btn-danger"
                                            >
                                                Hủy
                                            </button>
                                        </template>
                                        <template v-else-if="selectedTab === 'Duyệt'">
                                            <button
                                                @click="viewBooking(booking)"
                                                class="btn btn-sm btn-light mb-1"
                                            >
                                                View
                                            </button>
                                            <button
                                                @click="checkinBooking(booking)"
                                                class="btn btn-sm btn-primary"
                                            >
                                                Checkin
                                            </button>
                                        </template>
                                        <template v-else-if="selectedTab === 'Nhận phòng'">
                                            <button
                                                @click="viewBooking(booking)"
                                                class="btn btn-sm btn-light mb-1"
                                            >
                                                View
                                            </button>
                                            <button
                                                @click="checkoutBooking(booking)"
                                                class="btn btn-sm btn-info"
                                            >
                                                Checkout
                                            </button>
                                        </template>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div
            v-if="selectedBooking"
            class="modal fade show"
            style="display: block"
            tabindex="-1"
            role="dialog"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ selectedBooking.guest }}</h5>
                        <button type="button" class="close" @click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Ngày đặt:</strong> {{ selectedBooking.date }}</p>
                        <p><strong>Ngày nhận phòng:</strong> {{ selectedBooking.checkin }}</p>
                        <p><strong>Ngày trả phòng:</strong> {{ selectedBooking.checkout }}</p>
                        <p><strong>Trạng thái:</strong> {{ selectedBooking.status }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="selectedBooking" class="modal-backdrop fade show"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedTab: 'All',
            selectedBooking: null, // Used for modal display
            bookings: [
                {
                    guest: 'John Doe',
                    date: '2024-06-01',
                    checkin: '2024-06-10',
                    checkout: '2024-06-15',
                    status: 'Chờ duyệt',
                    link: '#',
                },
                {
                    guest: 'Jane Smith',
                    date: '2024-06-05',
                    checkin: '2024-06-12',
                    checkout: '2024-06-18',
                    status: 'Duyệt',
                    link: '#',
                },
                {
                    guest: 'Michael Brown',
                    date: '2024-06-08',
                    checkin: '2024-06-15',
                    checkout: '2024-06-20',
                    status: 'Nhận phòng',
                    link: '#',
                },
            ],
            statusColors: {
                'Chờ duyệt': 'warning',
                Duyệt: 'success',
                'Nhận phòng': 'info',
            },
        };
    },
    computed: {
        filteredBookings() {
            if (this.selectedTab === 'All') {
                return this.bookings;
            } else {
                return this.bookings.filter((booking) => booking.status === this.selectedTab);
            }
        },
    },
    methods: {
        viewBooking(booking) {
            this.selectedBooking = booking;
        },
        approveBooking(booking) {
            // Logic to approve booking
            booking.status = 'Duyệt';
            this.selectedBooking = null; // Close modal if open
        },
        cancelBooking(booking) {
            // Logic to cancel booking
            booking.status = 'Hủy';
            this.selectedBooking = null; // Close modal if open
        },
        checkinBooking(booking) {
            // Logic to check-in booking
            booking.status = 'Nhận phòng';
            this.selectedBooking = null; // Close modal if open
        },
        checkoutBooking(booking) {
            // Logic to check-out booking
            booking.status = 'Trả phòng';
            this.selectedBooking = null; // Close modal if open
        },
        closeModal() {
            this.selectedBooking = null;
        },
    },
};
</script>

<style scoped>
.table-responsive {
    margin-bottom: 15px;
}

.modal {
    display: block;
    background: rgba(0, 0, 0, 0.5);
}

.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.nav-tabs .nav-link.active {
    background-color: #007bff;
    color: white;
}
</style>
