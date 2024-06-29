<template>
	<div class="row" style="margin-top: 100px">
		<v-fullloading :loading="loading"></v-fullloading>
		<div class="col-12">
			<div class="card w-100" style="border-color: black; border-width: 1px; border-radius: 10px">
				<div class="card-header border-bottom" style="
                        border-color: black;
                        border-width: 1px;
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                    ">
					<h4 class="title">Danh sách đặt phòng</h4>
				</div>
				<div class="card-body pb-0">
					<div class="row g-3 align-items-center justify-content-between mb-3">
						<div class="row col-lg-12">
							<div class="col-lg-4 m-2">
								<input class="input__field" type="date" v-model="checkin_date" />
								<span class="input__label">Ngày nhận phòng</span>
							</div>
							<div class="col-lg-4 m-2">
								<input class="input__field" type="date" v-model="checkout_date" />
								<span class="input__label">Ngày trả phòng</span>
							</div>
							<div class="col-lg-2 m-2">
								<button class="btn border-0 m-2 btn-search" :disabled="loading" @click="fetchData()">
									<span>Tra cứu</span>
								</button>
							</div>
						</div>
					</div>
					<ul class="nav nav-tabs mb-2">
						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'All' }" @click="
								selectedTab = 'All';
							fetchData();
							">All({{ countBooking.all ?? 0 }})</a>
						</li>

						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'Chờ duyệt' }" @click="
								selectedTab = 'Chờ duyệt';
							status = 0;
							fetchData();
							">Chờ duyệt({{ countBooking.wait ?? 0 }})</a>
						</li>

						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'Duyệt' }" @click="
								selectedTab = 'Duyệt';
							status = 1;
							fetchData();
							">Duyệt({{ countBooking.approve ?? 0 }})</a>
						</li>
						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'Nhận phòng' }" @click="
								selectedTab = 'Nhận phòng';
							status = 2;
							fetchData();
							">Nhận phòng({{ countBooking.checkin ?? 0 }})</a>
						</li>
						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'Trả phòng' }" @click="
								selectedTab = 'Trả phòng';
							status = 3;
							fetchData();
							">Trả phòng({{ countBooking.checkout ?? 0 }})</a>
						</li>
						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'Đã đánh giá' }" @click="
								selectedTab = 'Đã đánh giá';
							status = -1;
							fetchData();
							">Đã đánh giá({{ countBooking.review ?? 0 }})</a>
						</li>
						<li class="nav-item pointer">
							<a class="nav-link" :class="{ active: selectedTab === 'Đã hủy' }" @click="
								selectedTab = 'Đã hủy';
							status = -1;
							fetchData();
							">Đã hủy({{ countBooking.cancel ?? 0 }})</a>
						</li>
					</ul>
					<div class="table-responsive border-0"
						style="border-top-left-radius: 10px; border-top-right-radius: 10px">
						<table class="table align-middle p-4 mb-0 table-hover table-shrink">
							<thead class="table-light" style="
                                    background-color: #ffeac64a;
                                    border-top-left-radius: 10px;
                                    border-top-right-radius: 10px;
                                ">
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
										<div :class="`bg-${statusColors[booking.status]} badge text-white`">
											{{ filter(booking.status) }}
										</div>
									</td>
									<td>
										<button @click="viewBooking(booking), showDetail(booking.id)"
											class="btn btn-sm btn-light mb-1"
											style="border-radius: 10px; width: 40px; height: 40px">
											<i class="fa fa-solid fa-eye"></i>
										</button>
										<template v-if="selectedTab === 'Chờ duyệt'">
											<button @click="updateStatus(booking.id, 1)"
												class="btn btn-sm btn-success mb-1 p-2" style="
                                                    border-radius: 10px;
                                                    width: 40px;
                                                    height: 40px;
                                                ">
												<i class="fa fa-solid fa-check" style="color: #192843"></i>
											</button>
											<button @click="cancelBooking(booking)"
												class="btn btn-sm btn-danger mb-1 p-2" style="
                                                    border-radius: 10px;
                                                    width: 40px;
                                                    height: 40px;
                                                ">
												<i class="fa fa-solid fa-trash" style="color: #1f2632"></i>
											</button>
										</template>
										<template v-else-if="selectedTab === 'Duyệt'">
											<button @click="
												checkinBooking(booking.id),
												updateStatus(booking.id, 2)
												" class="btn btn-sm btn-primary mb-1 p-2" style="
                                                    border-radius: 10px;
                                                    width: 40px;
                                                    height: 40px;
                                                ">
												<i class="fa fa-solid fa-check" style="color: #192843"></i>
											</button>
										</template>
										<template v-else-if="selectedTab === 'Nhận phòng'">
											<button @click="
												checkoutBooking(booking.id),
												updateStatus(booking.id, 3)
												" class="btn btn-sm btn-info mb-1 p-2" style="
                                                    border-radius: 10px;
                                                    width: 40px;
                                                    height: 40px;
                                                ">
												<i class="fa fa-solid fa-check" style="color: #192843"></i>
											</button>
										</template>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<pagination :data="data" v-on:pagination-change-page="fetchData" align="center"></pagination>
			</div>
		</div>

		<!-- Modal -->
		<div v-if="selectedBooking" class="modal fade show" style="display: block" tabindex="-1" role="dialog">
			<div class="modal-dialog custom-modal-size" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">{{ details.guest_name }}</h5>
						<button type="button" class="close" @click="closeModal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<label for="start_day" class="form-label d-block">Ngày bắt đầu</label>
								<div class="">
									<h6 class="form-control form-control-lg" style="border-radius: 10px">
										{{ details.checkin_date }}
									</h6>
								</div>
							</div>
							<div class="col-md-6">
								<label for="close_day" class="form-label d-block">Ngày kết thúc</label>
								<div class="">
									<h6 class="form-control form-control-lg" style="border-radius: 10px">
										{{ details.checkout }}
									</h6>
								</div>
							</div>
						</div>
						<div v-for="room in rooms" :key="room.id">
							<div class="row">
								<div class="col-md-6">
									<label class="form-label d-block">Loại phòng</label>

									<div class="">
										<h6 class="form-control form-control-lg" style="border-radius: 10px">
											{{ room.type }}
										</h6>
									</div>
								</div>
								<div class="col-md-2">
									<label class="form-label d-block">Số lượng phòng</label>
									<h6 class="form-control form-control-lg" style="border-radius: 10px">
										{{ room.count }}
									</h6>
								</div>
								<div class="col-md-4">
									<label class="form-label d-block" style="height: 22px"></label>
									<h6 class="form-control form-control-lg border-0" style="border-radius: 10px">
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
			details: [],
			statusColors: {
				"-1": 'danger',
				"0": 'warning',
				"1": 'success',
				'2': 'info',
				'3': 'secondary',
				'4': 'dark',
			},
			title: 'Tất cả',
			countBooking: {

			}
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
				this.data = response.data.data;
				this.bookings = this.data.data;
				console.log(this.bookings);
				const countResponse = await axios.get(`/api/booking/count`);
				this.countBooking = countResponse.data.data;
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
			this.loading = true;
			this.selectedBooking = booking;
			this.loading = false;
		},
		async showDetail(bookingId) {
			this.loading = true;
			try {
				const response = await axios.get(`/api/booking/show/${bookingId}`);
				console.log(response);
				this.data = response.data.data;
				this.details = this.data.data;
				console.log(this.details);
				// this.items = this.data.data
			} catch (error) {
				console.error('Error fetching data:', error);
			}
			this.loading = false;
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
		filter(status) {
			if (status == -1) {
				return 'Đã huỷ'
			} else if (status == 0) {
				return 'Chờ duyệt'
			} else if (status == 1) {
				return 'Đã duyệt'

			} else if (status == 2) {
				return 'Đã nhận phòng'
			} else if (status == 3) {
				return 'Đã trả phòng'

			} else if (status == 4) {
				return 'Đã đánh giá'
			}
		}
	},
};
</script>

<style scoped>
.table-responsive {
	margin-bottom: 15px;
}

.card-header {
	background-color: rgb(255, 255, 255);
}

.modal {
	display: block;
	background: rgba(0, 0, 0, 0.5);
}

.custom-modal-size {
	max-width: 80%;
	/* Adjust as needed */
	width: 80%;
	/* Adjust as needed */
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
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	background-color: #fcad37;
	color: #513306;
}

.nav-link:hover {
	background-color: #faf7df;
	color: #ffa217;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
}

.btn-search {
	background-color: #fcad37;
	color: #513306;
	width: 150px;
	border-radius: 10px;
}

.btn-search:hover {
	background-color: #faf7df;
	color: #ffa217;
}

.title {
	font-weight: bold;
}

.pointer {
	cursor: pointer;
}
</style>
