<template>
    <div class="row" style="margin-top: 100px">
        <v-fullloading :loading="loading"></v-fullloading>
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
                        <div class="row col-lg-10">
                            <div class="col-lg-5 m-2">
                                <input class="input__field" type="date" v-model="checkin_date" />
                                <span class="input__label">Checkin Date</span>
                            </div>
                            <div class="col-lg-5 m-2">
                                <input class="input__field" type="date" v-model="checkout_date" />
                                <span class="input__label">Checkout Date</span>
                            </div>
                            <div class="col-lg-5 m-2">
                                <button
                                    class="btn border-0 m-2"
                                    :disabled="loading"
                                    @click="fetchData()"
                                    style="
                                        background-color: rgb(240 181 145 / 50%);
                                        color: #ef7d4ae6;
                                        width: 150px;
                                        border-radius: 10px;
                                    "
                                >
                                    <span>Tra cứu </span>
                                    <span v-if="loading">
                                        <i class="fas fa-circle-notch fa-spin"></i> Checking...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mb-2">
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'All' }"
                                @click="
                                    selectedTab = 'All';
                                    fetchData();
                                "
                                >All</a
                            >
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Chờ duyệt' }"
                                @click="
                                    selectedTab = 'Chờ duyệt';
                                    status = 0;
                                    fetchData();
                                "
                                >Chờ duyệt</a
                            >
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Duyệt' }"
                                @click="
                                    selectedTab = 'Duyệt';
                                    status = 1;
                                    fetchData();
                                "
                                >Duyệt</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Nhận phòng' }"
                                @click="
                                    selectedTab = 'Nhận phòng';
                                    status = 2;
                                    fetchData();
                                "
                                >Nhận phòng</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Trả phòng' }"
                                @click="
                                    selectedTab = 'Trả phòng';
                                    status = 3;
                                    fetchData();
                                "
                                >Trả phòng</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                :class="{ active: selectedTab === 'Đã hủy' }"
                                @click="
                                    selectedTab = 'Đã hủy';
                                    status = -1;
                                    fetchData();
                                "
                                >Đã hủy</a
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
                                <tr v-for="(booking, index) in bookings" :key="index">
                                    <td>
                                        <h6 class="mb-0">{{ index + 1 }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0">
                                            <a :href="booking.link">{{ booking.guest_name }}</a>
                                        </h6>
                                    </td>
                                    <td>{{ booking.created_at }}</td>
                                    <td>
                                        <h6 class="mb-0 fw-light">{{ booking.checkin_date }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 fw-light">{{ booking.checkout_date }}</h6>
                                    </td>
                                    <td>
                                        <div :class="`bg-${statusColors[booking.status]} badge`">
                                            {{ booking.status }}
                                        </div>
                                    </td>
                                    <td>
                                        <button
                                            @click="viewBooking(booking)"
                                            class="btn btn-sm btn-light mb-1"
                                        >
                                            View
                                        </button>
                                        <template v-if="selectedTab === 'Chờ duyệt'">
                                            <button
                                                @click="updateStatus(booking.id, 1)"
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
                                                @click="
                                                    checkinBooking(booking.id),
                                                        updateStatus(booking.id, 2)
                                                "
                                                class="btn btn-sm btn-primary"
                                            >
                                                Checkin
                                            </button>
                                        </template>
                                        <template v-else-if="selectedTab === 'Nhận phòng'">
                                            <button
                                                @click="
                                                    checkoutBooking(booking.id),
                                                        updateStatus(booking.id, 3)
                                                "
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
                <pagination
                    :data="data"
                    v-on:pagination-change-page="fetchData"
                    align="center"
                ></pagination>
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
            <div class="modal-dialog custom-modal-size" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ selectedBooking.guest }}</h5>
                        <button type="button" class="close" @click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                                        {{ selectedBooking.checkin }}
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
                                        {{ selectedBooking.checkout }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div v-for="room in selectedBooking.rooms" :key="room.id">
                            <div class="row">
                                <div class="col-md-6">
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
                                <div class="col-md-2">
                                    <label class="form-label d-block">Số lượng phòng</label>
                                    <h6
                                        class="form-control form-control-lg"
                                        style="border-radius: 10px"
                                    >
                                        {{ room.count }}
                                    </h6>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label d-block" style="height: 22px"></label>
                                    <h6
                                        class="form-control form-control-lg border-0"
                                        style="border-radius: 10px"
                                    >
                                        {{ room.count }} x {{ room.price }} =
                                        {{ formatCurrency(room.price * room.count) }}
                                    </h6>
                                </div>
                            </div>
                        </div>
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
            status: '',
            phone_number: '',
            checkin_date: '',
            checkout_date: '',
            user_name: '',
            loading: false,
            data: {},
            bookings: [],
            statusColors: {
                'Chờ duyệt': 'warning',
                Duyệt: 'success',
                'Nhận phòng': 'info',
                'Đã hủy': 'secondary',
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
    async created() {
        this.loading = true;
        await this.fetchData();

        this.loading = false;
    },
    methods: {
        async fetchData(page = 1) {
            this.loading = true;
            try {
                const response = await axios.get(
                    `/api/booking/company-search?page=${page}&status=${this.status}&phone_number=${this.phone_number}&checkin_date=${this.checkin_date}&checkout_date=${this.checkout_date}&user=${this.user_name}`
                );
                console.log(response);
                this.data = response.data.data;
                this.bookings = this.data.data;
                console.log(this.bookings);
                // this.items = this.data.data
            } catch (error) {
                console.error('Error fetching data:', error);
            }
            this.loading = false;
        },
        async updateStatus(bookingId, status) {
            this.loading = true;
            try {
                const response = await axios.post(`/api/booking/change-status/${bookingId}`, {
                    status,
                });
                if (response.data.success) {
                    this.flashMessage.success({
                        title: 'Duyệt thành công',
                        time: 2000,
                    });
                }
                this.status = status;
                if ((this.status = 1)) {
                    this.selectedTab = 'Duyệt';
                    this.fetchData();
                } else if ((this.status = 2)) {
                    this.selectedTab = 'Nhận phòng';
                    this.fetchData();
                } else if ((this.status = 3)) {
                    this.selectedTab = 'Trả phòng';
                    this.fetchData();
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
            this.loading = false;
        },
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
            booking.status = 'Đã hủy';
            this.selectedBooking = null; // Close modal if open
        },
        async checkinBooking(bookingId) {
            this.loading = true;
            try {
                const response = await axios.get(`/api/booking/room-assign/${bookingId}`);
                if (response.data.success) {
                    this.flashMessage.success({
                        title: 'Nhận phòng thành công',
                        time: 2000,
                    });
                }
                this.status = status;
                this.selectedTab = 'Nhận phòng';
                this.fetchData();
            } catch (error) {
                console.error('Error fetching data:', error);
            }
            this.loading = false;
        },
        async checkoutBooking(bookingId) {
            this.loading = true;
            try {
                const response = await axios.get(`/api/booking/room-assign/${bookingId}`);
                if (response.data.success) {
                    this.flashMessage.success({
                        title: 'Trả phòng thành công',
                        time: 2000,
                    });
                }
                this.status = status;
                this.selectedTab = 'Trả phòng';
                this.fetchData();
            } catch (error) {
                console.error('Error fetching data:', error);
            }
            this.loading = false;
        },
        closeModal() {
            this.selectedBooking = null;
        },
        formatCurrency(value) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(
                value
            );
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
.custom-modal-size {
    max-width: 80%; /* Adjust as needed */
    width: 80%; /* Adjust as needed */
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
