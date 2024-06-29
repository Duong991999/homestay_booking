<template>
	<div class="container" style="margin-top: 80px">
        <v-fullloading :loading="loading"></v-fullloading>
		<div class="d-flex justify-content-center">
			<img src="assets/image/fake/sreach.jpg" width="100%" height="500" style="border-radius: 20px" />
			<div class="row position-absolute" style="top: 400px; z-index: 1">
				<div class="col-xl-12 position-relative z-1 mt-n3 mt-xl-n9">
					<form class="card shadow rounded-3 position-relative p-4 pe-md-5 pb-5 pb-md-4"
						style="width: 950px; border-radius: 20px">
						<div class="row g-4 align-items-center">
							<div class="input col-lg-4">
								<input class="input__field" type="text" v-model="homestay.address" @focus="isFocused = true"
									@blur="isFocused = false" />
								<span class="input__label">Địa điểm</span>
							</div>
							<div class="col-lg-3">
								<input class="input__field" type="date" v-model="homestay.checkinDate" @focus="isFocused = true"
									@blur="isFocused = false" />
								<span class="input__label">Ngày nhận phòng</span>
							</div>
							<div class="col-lg-3">
								<input class="input__field" type="date" v-model="homestay.checkoutDate" @focus="isFocused = true"
									@blur="isFocused = false" />
								<span class="input__label">Ngày trả phòng</span>
							</div>

							<div class="col-lg-1 position-absolute" style="left: 850px">
								<button class="btn btn-primary custom-bg border-0" type="submit"
									style="border-radius: 50px; width: 4rem; height: 4rem">
									<img src="assets/image/icon/search.png" alt="search " style="width: 100%" @click.prevent="fetchData()"/>
									
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="mt-4">
			<label class="btn btn-custor btn-primary-check mb-0 collapsed p-2" for="btn-check-soft"
				data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-controls="collapseFilter"
				aria-expanded="false" style="border-radius: 10px" @click="toggleReply"><svg width="1em" height="1em"
					viewBox="0 0 16 16" fill="currentColor" role="img" focusable="false" class="fa-fe me-1 mb-1">
					<path fill-rule="evenodd"
						d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z">
					</path>
				</svg>
				Lọc
			</label>

			<div v-if="show" class="mt-3">
				<div class="card  p-4 mt-4 w-100" style="border-radius: 20px;background-color:rgb(255 253 250);">
					<!----><!----><!---->
					<form class="row g-4 px-4">
						<div class="col-md-5 col-lg-6">
							<div class="form-control-borderless">
								<label class="form-label font-weight-bold">Tên Homestay </label><input type="text"
									class="form-control form-control-lg" style="border-radius: 15px"
									v-model="homestay.name" />
							</div>
						</div>
						<div class="col-md-5 col-lg-6">
							<label for="citySelect">Tỉnh/Thành phố</label>
							<v-multi-select
								v-model="homestay.city_code"
								:options="cityOptions"
								mode="single"
								id="citySelect"
								@change="homestay.district_code = ''"
								style="border-radius: 10px"
							>
							</v-multi-select>
						</div>
						<!-- District -->
						<div class="col-md-5 col-lg-6">
							<label for="districtSelect">Thị xã / Quận / Huyện</label>
							<v-multi-select
								v-model="homestay.district_code"
								:options="getDistrictOptions"
								mode="single"
								id="citySelect"
								@change="homestay.ward_code = ''"
								style="border-radius: 10px"
							>
							</v-multi-select>
						</div>
						<!-- Ward -->
						<div class="col-md-5 col-lg-6">
							<label for="wardSelect">Xã / Phường / Thị trấn</label>
							<v-multi-select
								v-model="homestay.ward_code"
								:options="getWardOptions"
								mode="single"
								id="wardSelect"
								style="border-radius: 10px"
							>
							</v-multi-select>
						</div>
						<div class="col-md-5 col-lg-6">
							<div class="form-control-borderless">
								<label class="form-label font-weight-bold">Mức giá</label>
								<div class="row mt-2">
									<span class="col-md-2">0VND</span>
									<div class="col-md-6">
										<vue-slider v-model="minToMaxPrice" :enable-cross="false" :max="10000000">
										</vue-slider>
									</div>
									<span class="col-md-4">10.000.000VND</span>
								</div>
								<div>
									<!-- <vue-slider v-model="value" :enable-cross="false"></vue-slider> -->
								</div>
							</div>
						</div>
						<div class="col-md-5 col-lg-6" style="padding-top: 30px">
							<div class="form-size-lg form-control-borderless">
								<label class="form-label font-weight-bold">Hình Thức</label><!---->
								<v-multi-select v-model="homestay.categories" placeholder="Select your character"
									:options="categoryOptions" mode="single" id="categorySelect" style="
                                        border-top-left-radius: 15px;
                                        border-top-right-radius: 15px;
                                        height: 46px;
                                    ">
								</v-multi-select>
							</div>
						</div>
						<div class="col-md-5 col-lg-6" style="padding-top: 30px">
							<div class="form-control-borderless">
								<label class="form-label font-weight-bold">Đánh giá</label>
								<star-rating :star-size="35" :show-rating="false" v-model="homestay.rating"></star-rating>
							</div>
						</div>

						<div class="col-12" style="padding-top: 30px; padding-bottom: 30px">
							<div class="form-control-borderless">
								<label class="form-label font-weight-bold">Tiện ích</label>
								<div class="row g-3">
									<div v-for="(amenity, index) in amenities" :key="index"
										class="col-md-4 col-lg-3 col-xl-2 col-6">
										<div class="form-check m-2">
											<input class="form-check-input" type="checkbox"
												:id="'flexCheckDefault-amenities' + index" :value="amenity" />
											<label class="form-check-label h6 fw-light mb-0"
												:for="'flexCheckDefault-amenities' + index">
												{{ amenity }}
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 d-flex justify-content-end">
							<button class="btn btn-md btn-link p-0 mb-0 text-decoration-none" type="button"
								style="margin-right: 30px">
								Xóa hết</button>
								<button class="btn btn-search mb-0 ms-3 text-decoration-none"
								type="button"
								@click.prevent="fetchData()">
								Tìm kiếm
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div>
			<homestay-list :items="homestayList"></homestay-list>
			<pagination :data="data" v-on:pagination-change-page="fetchData" align="center"></pagination>
		</div>
	</div>
</template>
<script>
import treeAddress from '@/address_tree.json';
import HomestayList from '@/user/homestay/HomestayList.vue';
import StarRating from 'vue-star-rating';
import VueSlider from 'vue-slider-component';
import 'vue-slider-component/theme/antd.css';
export default {
	components: {
		HomestayList,
		StarRating,
		VueSlider,
	},
	data() {
		return {
			homestayList: [],
			show: false,
			inputValue: '',
			star_day: '',
			close_day: '',
			selectedPopular: null,
			selectedCategoryr: null,
			categoryOptions: [],
			amenities: [
				'Điều hòa ',
				'Dịch vụ phòng',
				'Ăn uống',
				'Người chăm sóc',
				'Wifi miễn phí',
				'Dịch vụ',
				'Lửa trại',
				'Khẩu trang',
				'Spa',
				'Hồ bơi',
				'Trung tâm thể dục',
				'Quầy bar',
			],
			isFocused: false,
			minToMaxPrice: [0, 0],
			address: '',
			checkinDate: '',
			checkoutDate: '',
			homestay: {
				name: null,
				categories: [],
				rating: null,

			},
			cityOptions: this.getOptions(treeAddress),
			districtOptions: [],
            wardOptions: [],
			loading: false,
			data:{}
		};
	},
	methods: {
		toggleReply() {
			this.show = !this.show;
		},
		async loadCategoryOptions() {
			const responseCategory = await axios.get(`/api/admin/category/all`);
			this.categoryOptions = responseCategory.data.data.map((category) => {
				return {
					value: category.id,
					label: category.name,
				};
			});
		},
		getOptions(objOptions) {
            let cityOptions = [];

            for (let key in objOptions) {
                cityOptions.push({
                    value: key.toString(),
                    label: objOptions[key]['name'],
                });
            }
            return cityOptions;
        },
		async fetchData(page = 1, firstLoading = false) {
			this.loading = true;
			try {
				let par;
				if(firstLoading){
					par = {
						address: this.homestay.address,
						checkinDate: this.homestay.checkinDate,
						checkoutDate: this.homestay.checkoutDate,
					}
				}else{
					par = {
						...this.homestay,
						min_price: this.minToMaxPrice[0],
						max_price: this.minToMaxPrice[1],
					}
				}
				const response = await axios.get(`/api/homestay/search?page=${page}`, {
					params:par
				});
				this.data = response.data.data;
				this.homestayList = this.formatData(this.data.data)
			} catch (error) {
				console.error('Error fetching data:', error);
			}
			this.loading = false;
		},
		formatData(homestays){
			return homestays.map(function(item){
				let features = [];
				item.categories.forEach(cate => {
					features.push(cate.name)
				})
			
				return {
					file_path: item.files[0].file_path,
					file_name: item.files[0].file_name,
					rating: item.rating,
					min_price: item.min_price,
					max_price: item.max_price,
					name: item.name,
					features: features,
					address: item.address,
					id: item.id
				}
			})
		}
	},
	created() {
		if (this.$route.query.address) {
			this.homestay.address = this.$route.query.address;
		}
		if (this.$route.query.checkinDate) {
			this.homestay.checkinDate = this.$route.query.checkinDate;
		}
		if (this.$route.query.checkoutDate) {
			this.homestay.checkoutDate = this.$route.query.checkoutDate;
		}
		this.fetchData(1, true)
		this.loadCategoryOptions();
	},
	computed: {
		getDistrictOptions() {
			let districtOptions = this.homestay.city_code
				? this.getOptions(treeAddress[this.homestay.city_code]['quan-huyen'] ?? [])
				: [];
			this.districtOptions = districtOptions
			return districtOptions
		},
		getWardOptions() {
			let wardOptions = this.homestay.district_code && this.homestay.city_code
				? this.getOptions(
					treeAddress[this.homestay.city_code]['quan-huyen'][
					this.homestay.district_code
					]['xa-phuong'] ?? []
				)
				: [];
			this.wardOptions = wardOptions
			return wardOptions
		},
	},
};
</script>

<style>
.input {
	position: relative;
}

.custom-bg {
	background-color: #f87f06d2;
}

.input__label {
	position: absolute;
	left: 10px;
	/* Điều chỉnh khoảng cách từ mép trái */
	top: -10px;
	/* Điều chỉnh khoảng cách từ mép trên */
	background: white;
	/* Đổi màu nền nếu cần */
	padding: 0 5px;
	/* Điều chỉnh padding nếu cần */
	font-weight: bold;
	color: #888;
	/* Đổi màu chữ nếu cần */
	z-index: 1;
	border-radius: 10px;
}

.input__field {
	box-sizing: border-box;
	width: 100%;
	border: 2px solid #ccc;
	padding: 10px;
	border-radius: 10px;
}

.input__field:focus+.input__label,
.input__field:not(:placeholder-shown)+.input__label {
	top: -10px;
	/* Điều chỉnh vị trí khi input field được focus */
	font-size: 12px;
	/* Điều chỉnh kích thước chữ khi input field được focus */
	color: #333;
	/* Đổi màu chữ khi input field được focus */
	border-radius: 10px;
}

.slide-fade-vertical-enter-active,
.slide-fade-vertical-leave-active {
	transition: all 1.5s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.slide-fade-vertical-enter,
.slide-fade-vertical-leave-to

/* .slide-fade-vertical-leave-active in <2.1.8 */
	{
	transform: translateY(-10px);
	opacity: 0;
}

.list-inline-item {
	margin: 6px;
}

.btn-secondary:not(:disabled):not(.disabled).active {
	color: #000000;
	background-color: #ffffff;
	border-color: #ffffff;
}

.btn-secondary.focus {
	color: #2926e6;
	background-color: #d2edff;
	border-color: #2926e6;
}

.btn-secondary {
	color: #2926e6;
	background-color: #d2edff;
	border-color: #2926e6;
}

.btn-dark {
	color: #fff;
	background-color: #0a0d0e;
	border-color: #7b8a8b;
}
.btn-custor{
	background-color: #fcad37 ;
	color:#513306
}
.btn-search{
	background-color: #fcad37 ;
	color:#513306;
	border-radius:10px ;
}
.btn-search:hover{
	background-color: #faf7df;
    color: #ffa217;
}
</style>
