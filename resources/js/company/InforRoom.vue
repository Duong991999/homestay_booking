<template>
    <div class="container">
        <div class="card shadow w-100" style="margin-top: 100px">
            <div
                class="card-header border-bottom d-flex justify-content-between align-items-center"
                style="
                    border-top-left-radius: 20px;
                    border-top-right-radius: 20px;
                    background-color: #fff;
                "
            >
                <h5 class="mb-0 font-weight-bold">Thêm loại phòng</h5>
            </div>
            <div class="card-body">
                <div class="row pl-4">
                    <div class="col-md-6">
                        <fieldset>
                            <legend
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Tên phòng *
                            </legend>
                            <div>
                                <input
                                    class="form-control"
                                    v-model="roomtype.name"
                                    type="text"
                                    placeholder="Thêm tên phòng"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="">
                            <legend
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Giá phòng *
                            </legend>
                            <div>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="roomtype.price"
                                    placeholder="Thêm giá phòng"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6 mt-4">
                        <legend
                            tabindex="-1"
                            class="form-label bv-no-focus-ring col-form-label pt-0"
                        >
                            Ảnh giới thiệu
                        </legend>
                        <v-image-multiple-input
                            @file-selected="handleFileChange"
                            :imageList="roomtype.files"
                        >
                        </v-image-multiple-input>
                    </div>
                    <div class="col-md-6 mt-4">
                        <label>Mô tả</label>
                        <textarea
                            class="form-control"
                            v-model="roomtype.content"
                            id="exampleFormControlTextarea1"
                            rows="3"
                            style="border-radius: 10px"
                        ></textarea>
                    </div>
                </div>

                <!---list-->
                <div class="col-md-12 pl-0" style="margin-top: 40px">
                    <legend tabindex="-1" class="form-label bv-no-focus-ring col-form-label pl-4">
                        Danh sách phòng
                    </legend>
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="container">
                                <div class="bg-light rounded d-none d-lg-block">
                                    <div class="row g-4">
                                        <div class="col-sm-6 d-flex justify-content-center pb-2">
                                            <h6 class="font-weight-bold">Số phòng</h6>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-center pb-2">
                                            <h6 class="font-weight-bold">Hoạt động</h6>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    v-for="(room, index) in roomtype.rooms"
                                    :key="index"
                                    class="row g-4 mt-2"
                                >
                                    <div class="col-sm-6 d-flex justify-content-center">
                                        <small class="d-block d-lg-none">Số phòng</small>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xs flex-shrink-0"></div>
                                            <div class="ms-2 d-flex justify-content-center">
                                                <input
                                                    v-model="room.name"
                                                    class="form-control"
                                                    placeholder="Room Name"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row d-flex justify-content-around">
                                            <button
                                                class="btn btn-danger mb-0"
                                                @click="deleteRoom(index)"
                                            >
                                                Xóa
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-4 mt-4">
                                    <div class="col-12 d-flex justify-content-center">
                                        <button class="btn btn-primary" @click="addRoom">
                                            Thêm phòng mới
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <button
                    type="submit"
                    class="btn btn-primary btn-submit"
                    :disabled="loading"
                    @click.prevent="create"
                >
                    Đăng kí
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            roomtype: {
                content: null,
                name: null,
                price: null,
                files: [],
                rooms: [],
            },
            loading: false,
            fileData: {
                files: [],
                deleted_id: [],
            },
        };
    },
    methods: {
        async create() {
            this.loading = true;
            const formData = new FormData();
            for (let i = 0; i < this.fileData.files.length; i++) {
                let file = this.fileData.files[i];
                formData.append('files[' + i + ']', file);
            }
            for (let i = 0; i < this.fileData.deleted_id.length; i++) {
                let file = this.fileData.deleted_id[i];
                formData.append('delete_file_id[' + i + ']', file);
            }
            formData.append('name', this.roomtype.name);
            formData.append('price', this.roomtype.price);
            try {
                const response = await axios.post(`/api/room-type/store`, formData);
                if (response.data.success) {
                    this.flashMessage.success({
                        title: 'Đăng kí thành công',
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
        addRoom() {
            this.roomtype.rooms.push({ name: '' });
        },
        deleteRoom(index) {
            this.roomtype.rooms.splice(index, 1);
        },
    },
};
</script>

<style>
.btn-submit {
    position: absolute;
    bottom: 15px;
    right: 15px;
    border-radius: 10px;
}
</style>
