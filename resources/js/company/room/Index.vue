<template>
    <div class="col-12" style="margin-top: 100px">
        <div class="card border w-100">
            <div class="card-header border-bottom" style="background-color: white">
                <div class="row d-flex justify-content-between">
                    <h5 class="card-header-title ml-4">
                        Quản lý phòng
                        <span class="badge ms-2 ml-4">{{ listings.length }} Loại Phòng</span>
                    </h5>
                    <router-link to="" class="btn btn-sm btn-success mb-0 ms-auto">
                        Add New Room Type
                    </router-link>
                </div>
            </div>
            <div class="card-body">
                <div
                    v-for="(listing, index) in listings"
                    :key="index"
                    class="card border w-100 m-0"
                >
                    <div class="row g-4">
                        <div class="col-md-3 col-lg-2">
                            <img :src="listing.image" class="card-img rounded-2" alt="Card image" />
                        </div>
                        <div class="col-lg-10" ms="9">
                            <div class="card-body position-relative d-flex flex-column p-0 h-100">
                                <div
                                    class="btn-group list-inline-item position-absolute top-0 end-0"
                                ></div>
                                <h5 class="card-title mb-0 me-5">
                                    <a href="#" class="">{{ listing.title }}</a>
                                </h5>

                                <div
                                    class="d-sm-flex justify-content-sm-between align-items-center mb-2 mt-md-auto"
                                >
                                    <div class="d-flex align-items-center">
                                        <h5 class="fw-bold mb-0 me-1">${{ listing.price }}</h5>
                                        <span class="mb-0 me-2">/day</span>
                                    </div>
                                    <div class=" " style="margin-right: 20px">
                                        <button
                                            class="btn btn-sm btn-primary mb-0"
                                            @click="
                                            (listing)"
                                            type="button"
                                        >
                                            <img src="assets/image/icon/file.png  " width="20" />
                                        </button>
                                        <button
                                            href="#"
                                            class="btn btn-sm btn-danger p-2 ml-2"
                                            style="border-radius: 10px; background-color: #ff5050"
                                            @click.prevent="showDeleteModal(booking)"
                                        >
                                            <img src="assets/image/icon/bin.png  " width="20" />
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Room Type Modal -->
        <div
            class="modal fade"
            id="editRoomTypeModal"
            tabindex="-1"
            aria-labelledby="editRoomTypeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoomTypeModalLabel">Edit Room Type</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
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
                                <fieldset class="mt-4">
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
                            <div class="col-md-6 pl-4">
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
                        </div>

                        <!---list-->
                        <div class="col-md-12 pl-0" style="margin-top: 40px">
                            <legend
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pl-4"
                            >
                                Danh sách phòng
                            </legend>
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="bg-light rounded d-none d-lg-block">
                                            <div class="row g-4">
                                                <div
                                                    class="col-sm-6 d-flex justify-content-center pb-2"
                                                >
                                                    <h6 class="font-weight-bold">Số phòng</h6>
                                                </div>
                                                <div
                                                    class="col-sm-6 d-flex justify-content-center pb-2"
                                                >
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
                                                    <div
                                                        class="avatar avatar-xs flex-shrink-0"
                                                    ></div>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            roomtype: {
                name: null,
                price: null,
                files: [],
                rooms: [],
            },

            listings: [
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Pride moon Village Resort & Spa',
                    address: '31J W Spark Street, California - 24578',
                    price: 1586,
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Pride moon Village ',
                    address: '31J W Spark Street, California - 24578',
                    price: 1586,
                },
                // Add more listings as needed
            ],
            currentRoom: {
                title: '',
                image: '',
                price: 0,
            },
        };
    },
    methods: {
        openEditModal(listing) {
            this.currentRoom = { ...listing };
            const modal = new bootstrap.Modal(document.getElementById('editRoomTypeModal'));
            modal.show();
        },
        updateRoomType() {
            const index = this.listings.findIndex((room) => room.title === this.currentRoom.title);
            if (index !== -1) {
                this.listings.splice(index, 1, this.currentRoom);
            }
            const modal = bootstrap.Modal.getInstance(document.getElementById('editRoomTypeModal'));
            modal.hide();
        },
    },
};
</script>
