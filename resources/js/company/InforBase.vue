<template>
    <div class="mx-auto" style="margin-top: 150px">
        <div class="card shadow w-100" style="border-radius: 20px">
            <!----><!----><!---->
            <div
                class="card-header border-bottom"
                style="
                    border-top-left-radius: 20px;
                    border-top-right-radius: 20px;
                    background-color: #fff;
                "
            >
                <h4 class="mb-0 title">Tạo Homestay</h4>
            </div>

            <div class="card-body">
                <form @submit.prevent="submitForm">
                    <div class="form-group">
                        <label for="homestayName">Homestay của bạn tên gì?</label>
                        <div class="col-md-12">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Tên Homestay"
                                v-model="homestay.homestayName"
                                :class="[{ 'is-invalid': errorFor('homestayName') }]"
                                style="height: 40px; border-radius: 10px"
                            />
                            <v-errors :errors="errorFor('homestayNamme')"></v-errors>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="addressInfo">Homestay của bạn đang đăng ký nằm ở đâu?</label>
                        <div>
                            <p>
                                Chúng tôi có thể gửi thư để xác nhận vị trí chỗ nghỉ của Quý vị nên
                                hãy đảm bảo cung cấp địa chỉ chính xác – thông tin này sẽ khó thay
                                đổi sau đó.
                            </p>
                            <!-- City -->
                            <div class="col-md-12">
                                <label for="citySelect">Tỉnh/Thành phố</label>
                                <v-multi-select
                                    v-model="homestay.selectedCity"
                                    :options="cityOptions"
                                    mode="single"
                                    id="citySelect"
                                    @change="selectedDistrict = ''"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('selectedCity')"></v-errors>
                            </div>
                            <!-- District -->
                            <div class="col-md-12">
                                <label for="districtSelect">Thị xã / Quận / Huyện</label>
                                <v-multi-select
                                    v-model="homestay.selectedDistrict"
                                    :options="getDistrictOptions"
                                    mode="single"
                                    id="citySelect"
                                    @change="selectedWard = ''"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('selectedDistrict')"></v-errors>
                            </div>
                            <!-- Ward -->
                            <div class="col-md-12">
                                <label for="wardSelect">Xã / Phường / Thị trấn</label>
                                <v-multi-select
                                    v-model="homestay.selectedWard"
                                    :options="getWardOptions"
                                    mode="single"
                                    id="wardSelect"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('selectedWard')"></v-errors>
                            </div>
                            <!-- Category -->
                            <p>Homestay của bạn thuộc hình thức nào ?</p>
                            <div class="col-md-12">
                                <label for="CategorySelect">Hình thức Homestay</label>
                                <v-multi-select
                                    v-model="homestay.category"
                                    :options="options"
                                    mode="tags"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('category')"></v-errors>
                            </div>
                            <div class="col-md-12">
                                <label>Mô tả</label>
                                <textarea
                                    class="form-control"
                                    v-model="homestay.content"
                                    id="exampleFormControlTextarea1"
                                    rows="3"
                                    style="border-radius: 10px"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="loading"
                        @click.prevent="submit"
                    >
                        Đăng ký
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import treeAddress from '@/address_tree.json';
import validationErrors from '../shared/mixins/validationErrors';

export default {
    mixins: [validationErrors],
    data() {
        return {
            message_errors: null,
            homestayName: null,
            cityOptions: this.getOptions(treeAddress),
            selectedCity: null,
            selectedDistrict: null,
            selectedWard: null,
            loading: false,
            homestay: {
                homestayName: null,
                content: null,
                selectedCity: null,
                selectedDistrict: null,
                selectedWard: null,
                category: null,
            },
        };
    },
    methods: {
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
        async submit() {
            this.loading = true;
            this.errors = null;
            try {
                const response = await axios.post('/store', this.homestay);
                console.log('ok');
            } catch (error) {
                this.errors = error.response && error.response.data.errors;
            }
            this.loading = false;
        },
    },
    computed: {
        getDistrictOptions() {
            return this.selectedCity
                ? this.getOptions(treeAddress[this.selectedCity]['quan-huyen'] ?? [])
                : [];
        },
        getWardOptions() {
            return this.selectedDistrict && this.selectedCity
                ? this.getOptions(
                      treeAddress[this.selectedCity]['quan-huyen'][this.selectedDistrict][
                          'xa-phuong'
                      ] ?? []
                  )
                : [];
        },
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
.title {
    font-weight: 700;
    line-height: 1.25;
    color: black;
}
.col-md-12 {
    margin-bottom: 20px;
}
</style>
