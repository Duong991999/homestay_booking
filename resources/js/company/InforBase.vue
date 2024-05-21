<template>
    <div class="w-50 mx-auto" style="margin-top: 150px">
        <div class="card card-body">
            <form @submit.prevent="submitForm">
                <div class="form-group">
                    <label for="homestayName">Homestay của bạn tên gì?</label>
                    <input
                        type="text"
                        class="form-control"
                        id="homestayName"
                        placeholder="Tên Homestay"
                        v-model="homestayName"
                        @blur="homestayNameTouched = true"
                        :class="{ 'is-invalid': homestayNameTouched && !homestayName }"
                    />
                    <div class="invalid-feedback" v-if="homestayNameTouched && !homestayName">
                        Bạn chưa nhập tên Homestay.
                    </div>
                </div>

                <div class="form-group">
                    <label for="addressInfo">Homestay của bạn đang đăng ký nằm ở đâu?</label>
                    <div>
                        <p>
                            Chúng tôi có thể gửi thư để xác nhận vị trí chỗ nghỉ của Quý vị nên hãy
                            đảm bảo cung cấp địa chỉ chính xác – thông tin này sẽ khó thay đổi sau
                            đó.
                        </p>
                        <!-- City -->
                        <div class="col-md-12">
                            <label for="citySelect">Tỉnh/Thành phố</label>
                            <v-multi-select
                                v-model="selectedCity"
                                :options="cities"
                                mode="single"
                                id="citySelect"
                                required
                            >
                            </v-multi-select>
                        </div>
                        <!-- District -->
                        <div class="col-md-12">
                            <label for="districtSelect">Thị xã / Quận / Huyện</label>
                            <v-multi-select
                                v-model="selectedDistrict"
                                :options="districts"
                                mode="single"
                                id="citySelect"
                                required
                            >
                            </v-multi-select>
                        </div>
                        <!-- Ward -->
                        <div class="col-md-12">
                            <label for="wardSelect">Xã / Phường / Thị trấn</label>
                            <v-multi-select
                                v-model="selectedWard"
                                :options="wards"
                                mode="single"
                                id="wardSelect"
                                required
                            >
                            </v-multi-select>
                        </div>
                        <!-- Category -->
                        <div class="col-md-12">
                            <label for="CategorySelect">Hình thức Homestay</label>
                            <v-multi-select v-model="value" :options="options" mode="tags" required>
                            </v-multi-select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    data() {
        return {
            selectedCity: null,
            selectedDistrict: null,
            selectedWard: null,
            value: null,
            options: [
                'Batman',
                'Robin',
                'Joker',
                'District 1',
                'District 2',
                'District 3',
                'District 4',
                'District 5',
            ],
            cities: [
                'Batman',
                'Robin',
                'Joker',
                'District 1',
                'District 2',
                'District 3',
                'District 4',
                'District 5',
                'New York',
                'Los Angeles',
                'Chicago',
                'Houston',
                'Phoenix',
                // Add more cities as needed
            ],
            districts: [
                'District 1',
                'District 2',
                'District 3',
                'District 4',
                'District 5',
                // Add more districts as needed
            ],
            wards: [
                'Ward 1',
                'Ward 2',
                'Ward 3',
                'Ward 4',
                'Ward 5',
                // Add more wards as needed
            ],
        };
    },
};
</script>

<style scoped>
.invalid-feedback {
    display: block;
}
.is-invalid {
    border-color: #dc3545;
}
</style>
