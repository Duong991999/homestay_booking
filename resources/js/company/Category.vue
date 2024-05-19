<template>
    <div class="container w-50 mx-auto" style="margin-top: 100px">
        <router-link class="text-decoration-none" :to="{ name: 'inforbase' }">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Bước 1</p>
                    <h5 class="card-title">Thông tin chỗ nghỉ</h5>
                    <p class="card-text">
                        Các thông tin cơ bản. Nhập tên chỗ nghỉ, địa chỉ, tiện nghi và nhiều hơn
                        nữa.
                    </p>
                </div>
            </div>
        </router-link>
        <router-link class="text-decoration-none" :to="{ name: 'inforroom' }">
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Bước 2</p>
                    <h5 class="card-title">Căn</h5>
                    <p class="card-text">
                        Hãy cho chúng tôi biết về căn đầu tiên của Quý vị. Sau khi thiết lập xong
                        căn này, Quý vị có thể thêm nhiều căn khác.
                    </p>
                </div>
            </div>
        </router-link>
        <div class="card">
            <div class="card-body">
                <p class="card-text">Bước 1</p>
                <h5 class="card-title">Ảnh</h5>
                <p class="card-text">
                    Chia sẻ một số hình ảnh chỗ nghỉ của Quý vị để khách biết mình nên có những kỳ
                    vọng gì.
                </p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="card-text">Bước 1</p>
                <h5 class="card-title">Những bước cuối cùng</h5>
                <p class="card-text">
                    Nhập thông tin thanh toán và hóa đơn trước khi mở để nhận đặt phòng.
                </p>
            </div>
        </div>
    </div>
</template>
<style>
.card {
    width: 500px;
    height: auto;
    margin: 20px;
}
</style>
