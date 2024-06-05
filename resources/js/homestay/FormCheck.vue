<template>
    <div class="card shadow w-100">
        <!----><!----><!---->
        <div class="card-header border-bottom p-4" style="background-color: white">
            <h4 class="card-title mb-0">
                <svg
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    role="img"
                    focusable="false"
                    class="mb-1"
                >
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"
                    ></path>
                </svg>
                Xác nhận đặt phòng
            </h4>
        </div>
        <div class="card-body p-4">
            <!----><!---->
            <form class="row g-4">
                <div class="col-md-6">
                    <div class="" role="group">
                        <label for="first-name" class="form-label d-block">Tên</label>
                        <div class="">
                            <input
                                id="first-name"
                                class="form-control form-control-lg"
                                type="text"
                                placeholder="Enter your name"
                                style="border-radius: 10px"
                            /><!----><!----><!---->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="" role="group">
                        <label for="mobile" class="form-label d-block">Số điện thoại</label>
                        <div class="">
                            <input
                                id="mobile"
                                class="form-control form-control-lg"
                                type="tel"
                                placeholder="Enter your mobile number"
                                style="border-radius: 10px"
                            /><!----><!----><!---->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="" role="group">
                        <label for="email" class="form-label d-block">Email</label>
                        <div class="">
                            <input
                                id="email"
                                class="form-control form-control-lg"
                                type="text"
                                placeholder="Enter your email"
                                style="border-radius: 10px"
                            /><small class="text-body-secondary form-text"
                                >(Booking voucher will be sent to this email ID)</small
                            ><!----><!----><!---->
                        </div>
                    </div>
                </div>
            </form>
            <div class="alert alert-info my-4" role="alert">
                <a href="#/auth/login" class="alert-heading h6">Login</a> to prefill all details and
                get access to secret deals
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="start_day" class="form-label d-block">Ngày bắt đầu</label>
                    <div class="">
                        <h6 class="form-control form-control-lg" style="border-radius: 10px"></h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="close_day" class="form-label d-block">Ngày kết thúc</label>
                    <div class="">
                        <h6 class="form-control form-control-lg" style="border-radius: 10px"></h6>
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
        </div>
        <div class="row mb-4">
            <hr style="width: 80%; border: 0; border-top: 3px solid rgba(0, 0, 0, 0.1)" />
            <div class="col-md-6">
                <h5 class="text-right">Tổng giá tiền:</h5>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">{{ formatCurrency(totalCost) }}</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-danger">Cancel</button>
                    <button class="btn btn-primary">Book</button>
                </div>
            </div>
        </div>
        <!----><!---->
    </div>
</template>

<script>
export default {
    data() {
        return {
            rooms: [
                { id: 1, type: 'Vip-1', count: 6, price: 200 },
                { id: 2, type: 'Deluxe', count: 10, price: 150 },
                { id: 3, type: 'Standard', count: 15, price: 100 },
            ],
            totalCost: 0,
        };
    },
    mounted() {
        this.calculateTotalCost();
    },
    methods: {
        calculateTotalCost() {
            this.totalCost = this.rooms.reduce((total, room) => {
                return total + room.price * room.count;
            }, 0);
        },
        formatCurrency(value) {
            return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        },
        formatCurrency(value) {
            return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        },
    },
};
</script>
