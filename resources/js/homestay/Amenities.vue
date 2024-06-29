<template>
    <div class="card bg-transparent border-0 w-100">
        <!----><!----><!---->
        <div class="card-header border-bottom bg-transparent px-0 pt-0">
            <h3 class="card-title mb-0 font-weight-bold">Tiện ích</h3>
        </div>
        <div class="card-body pt-4 p-0">
            <!----><!---->
            <div class="row g-4">
                <div class="col-sm-6">
                    <h6 class="font-weight-bold">
                        <img
                            class="me-1"
                            src="assets/image/icon/bicycle.png"
                            width="17px"
                            height="17px"
                            alt="Activities"
                        />
                        Hoạt động
                    </h6>
                    <ul class="list-group list-group-borderless mt-2 mb-0">
                        <li
                            class="list-group-item pb-0"
                            v-for="(activity, index) in activities"
                            :key="index"
                        >
                            <svg
                                class="svg-inline--fa fa-circle-check text-success me-1"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                focusable="false"
                                data-prefix="fas"
                                data-icon="circle-check"
                                role="img"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    class=""
                                    fill="currentColor"
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"
                                ></path>
                            </svg>
                            {{ activity }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h6 class="font-weight-bold">
                        <img
                            class="me-1"
                            src="assets/image/icon/wallet.png"
                            width="17px"
                            height="17px"
                            alt="payments"
                        />Thanh toán
                    </h6>
                    <ul class="list-group list-group-borderless mt-2 mb-0">
                        <li
                            class="list-group-item pb-0"
                            v-for="(payment, index) in payments"
                            :key="index"
                        >
                            <svg
                                class="svg-inline--fa fa-circle-check text-success me-1"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                focusable="false"
                                data-prefix="fas"
                                data-icon="circle-check"
                                role="img"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    class=""
                                    fill="currentColor"
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"
                                ></path>
                            </svg>
                            {{ payment }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h6 class="font-weight-bold">
                        <img
                            class="me-1"
                            src="assets/image/icon/hotel-bell.png"
                            width="17px"
                            height="17px"
                            alt="services"
                        />
                        Dịch vụ
                    </h6>
                    <ul class="list-group list-group-borderless mt-2 mb-0">
                        <li
                            class="list-group-item pb-0"
                            v-for="(service, index) in services"
                            :key="index"
                        >
                            <svg
                                class="svg-inline--fa fa-circle-check text-success me-1"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                focusable="false"
                                data-prefix="fas"
                                data-icon="circle-check"
                                role="img"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    class=""
                                    fill="currentColor"
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"
                                ></path>
                            </svg>
                            {{ service }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h6 class="font-weight-bold">
                        <img
                            class="me-1"
                            src="assets/image/icon/shield.png"
                            width="17px"
                            height="17px"
                            alt="safety"
                        />
                        An toàn &amp; An ninh
                    </h6>
                    <ul class="list-group list-group-borderless mt-2 mb-4 mb-sm-5">
                        <li class="list-group-item pb-0">
                            <svg
                                class="svg-inline--fa fa-circle-check text-success me-1"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                focusable="false"
                                data-prefix="fas"
                                data-icon="circle-check"
                                role="img"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"
                            >
                                <path
                                    class=""
                                    fill="currentColor"
                                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"
                                ></path>
                            </svg>
                            Y tế khẩn cấp
                        </li>
                    </ul>
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
            activities: ['Hồ bơi', 'Spa', 'Khu vui chơi trẻ em', 'Phòng tập gym'],
            payments: ['Thẻ tín dụng (Visa, Master card)', 'Tiền mặt', 'Thẻ ghi nợ'],
            services: [
                'Giặt khô',
                'Dịch vụ phòng',
                'Dịch vụ đặc biệt',
                'Khu vực chờ',
                'Khu vực hút thuốc bí mật',
                'Dịch vụ hướng dẫn',
                'Cơ sở giặt là',
                'Dịch vụ ủi đồ',
                'Thang máy',
            ],
        };
    },
};
</script>
<style>
.list-group-borderless .list-group-item {
    border: none;
    padding: 0.425rem 0;
}
.me-1 {
    margin-right: 10px;
}
.col-sm-6 {
    padding-top: 20px;
}
</style>
