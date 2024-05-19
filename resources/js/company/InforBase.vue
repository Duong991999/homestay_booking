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
                        Hãy nhập tên Homestay.
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
                        <div class="col-md-12">
                            <label for="citySelect">Tỉnh/Thành phố</label>
                            <select
                                v-model="selectedCity"
                                class="custom-select"
                                id="citySelect"
                                required
                                @blur="cityTouched = true"
                                :class="{ 'is-invalid': cityTouched && !selectedCity }"
                            >
                                <option disabled value="">Lựa chọn Tỉnh / Thành phố</option>
                                <option v-for="city in cities" :key="city">{{ city }}</option>
                            </select>
                            <div class="invalid-feedback" v-if="cityTouched && !selectedCity">
                                Hãy chọn thành phố.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="districtSelect">Thị xã / Quận / Huyện</label>
                            <select
                                v-model="selectedDistrict"
                                class="custom-select"
                                id="districtSelect"
                                required
                                @blur="districtTouched = true"
                                :class="{ 'is-invalid': districtTouched && !selectedDistrict }"
                            >
                                <option disabled value="">Lựa chọn Thị xã / Quận / Huyện</option>
                                <option v-for="district in districts" :key="district">
                                    {{ district }}
                                </option>
                            </select>
                            <div
                                class="invalid-feedback"
                                v-if="districtTouched && !selectedDistrict"
                            >
                                Hãy chọn Thị xã / Quận / Huyện.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="townSelect">Xã / Phường / Thị trấn</label>
                            <select
                                v-model="selectedWard"
                                class="custom-select"
                                id="townSelect"
                                required
                                @blur="wardTouched = true"
                                :class="{ 'is-invalid': wardTouched && !selectedWard }"
                            >
                                <option disabled value="">Lựa chọn Xã / Phường / Thị trấn</option>
                                <option v-for="ward in wards" :key="ward">{{ ward }}</option>
                            </select>
                            <div class="invalid-feedback" v-if="wardTouched && !selectedWard">
                                Hãy chọn Xã / Phường / Thị trấn.
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tiếp tục</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const homestayName = ref('');
const selectedCity = ref('');
const selectedDistrict = ref('');
const selectedWard = ref('');

const homestayNameTouched = ref(false);
const cityTouched = ref(false);
const districtTouched = ref(false);
const wardTouched = ref(false);

const cities = ref([
    'New York',
    'Los Angeles',
    'Chicago',
    'Houston',
    'Phoenix',
    // Add more cities as needed
]);

const districts = ref([
    'District 1',
    'District 2',
    'District 3',
    'District 4',
    'District 5',
    // Add more districts as needed
]);

const wards = ref([
    'Ward 1',
    'Ward 2',
    'Ward 3',
    'Ward 4',
    'Ward 5',
    // Add more wards as needed
]);

const submitForm = () => {
    homestayNameTouched.value = true;
    cityTouched.value = true;
    districtTouched.value = true;
    wardTouched.value = true;

    if (
        !homestayName.value ||
        !selectedCity.value ||
        !selectedDistrict.value ||
        !selectedWard.value
    ) {
        return;
    }

    // Handle form submission
    console.log('Form submitted successfully');
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
