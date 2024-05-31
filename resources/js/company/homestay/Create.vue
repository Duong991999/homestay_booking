<template>
    <div class="mx-auto" style="margin-top: 150px">
        <!-- <v-fullloading :loading="loading"></v-fullloading> -->
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
                                v-model="homestay.name"
                                :class="[{ 'is-invalid': errorFor('name') }]"
                                style="height: 40px; border-radius: 10px"
                            />
                            <v-errors :errors="errorFor('name')"></v-errors>
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
                                    v-model="homestay.city_code"
                                    :options="cityOptions"
                                    mode="single"
                                    id="citySelect"
                                    @change="selectedDistrict = ''"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('city_code')"></v-errors>
                            </div>
                            <!-- District -->
                            <div class="col-md-12">
                                <label for="districtSelect">Thị xã / Quận / Huyện</label>
                                <v-multi-select
                                    v-model="homestay.district_code"
                                    :options="getDistrictOptions"
                                    mode="single"
                                    id="citySelect"
                                    @change="selectedWard = ''"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('district_code')"></v-errors>
                            </div>
                            <!-- Ward -->
                            <div class="col-md-12">
                                <label for="wardSelect">Xã / Phường / Thị trấn</label>
                                <v-multi-select
                                    v-model="homestay.ward_code"
                                    :options="getWardOptions"
                                    mode="single"
                                    id="wardSelect"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('ward_code')"></v-errors>
                            </div>
                            <!-- Category -->
                            <p>Homestay của bạn thuộc hình thức nào ?</p>
                            <div class="col-md-12">
                                <label for="CategorySelect">Hình thức Homestay</label>
                                <v-multi-select
                                    v-model="homestay.category_id"
                                    :options="categoryOptions"
                                    mode="tags"
                                    style="border-radius: 10px"
                                >
                                </v-multi-select>
                                <v-errors :errors="errorFor('category_id')"></v-errors>
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
                                <v-errors :errors="errorFor('content')"></v-errors>
                            </div>
                            <div class="col-md-12">
                                <label>Ảnh giới thiệu</label>
                                <v-image-multiple-input
                                    @file-selected="handleFileChange"
                                    :imageList="homestay.files"
                                >
                                </v-image-multiple-input>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="loading"
                        @click.prevent="create"
                    >
                        Đăng kí
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import treeAddress from '@/address_tree.json';
import validationErrors from '@/shared/mixins/validationErrors';

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
                name: null,
                content: null,
                city_code: null,
                district_code: null,
                ward_code: null,
                category_id: [],
                categories: [],
                files: [],
            },
            categoryOptions: [],
            message_errors: '',
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
        async create() {
            echo('1');
            this.loading = true;
            try {
                const response = await axios.post(`/api/homestay/store`, this.homestay);
                if (response.data.success) {
                    this.flashMessage.success({
                        title: 'Cập nhật thành công',
                        time: 2000,
                    });
                }
            } catch (error) {
                this.errors =
                    error.response && (error.response.data.errors || !error.response.data.success);
                if (!error.response.data.success) {
                    this.message_errors = error.response.data.message;
                }
            }
            this.loading = false;
        },
        handleFileChange(obj) {
            this.fileData = obj;
        },
        async loadCategoryOptions() {
            const responseCategory = await axios.get(`/api/admin/category/index`);
            this.categoryOptions = responseCategory.data.data.map((category) => {
                return {
                    value: category.id,
                    label: category.name,
                };
            });
        },
    },
    computed: {
        getDistrictOptions() {
            return this.homestay.city_code
                ? this.getOptions(treeAddress[this.homestay.city_code]['quan-huyen'] ?? [])
                : [];
        },
        getWardOptions() {
            return this.homestay.district_code && this.homestay.city_code
                ? this.getOptions(
                      treeAddress[this.homestay.city_code]['quan-huyen'][
                          this.homestay.district_code
                      ]['xa-phuong'] ?? []
                  )
                : [];
        },
    },
    async created() {
        this.loading = true;
        await this.loadCategoryOptions();
        this.loading = false;
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
