<template>
    <div class="container">
        <div class="card shadow w-100">
            <div
                class="card-header border-bottom"
                style="
                    border-top-left-radius: 20px;
                    border-top-right-radius: 20px;
                    background-color: #fff;
                "
            >
                <h5 class="mb-0">Overview</h5>
            </div>
            <div class="card-body">
                <p>Homestay của bạn có các tiện tích gì ?</p>
                <div class="col-md-12">
                    <label for="CategorySelect">Tiện ích</label>
                    <v-multi-select
                        v-model="amenities"
                        :options="options"
                        mode="tags"
                        style="border-radius: 10px"
                    >
                    </v-multi-select>
                    <!-- <v-errors :errors="errorFor('category')"></v-errors> -->
                </div>
                <div class="col-md-12">
                    <label>Mô tả</label>
                    <textarea
                        class="form-control"
                        v-model="content"
                        id="exampleFormControlTextarea1"
                        rows="3"
                        style="border-radius: 10px"
                    ></textarea>
                </div>
            </div>
        </div>

        <div class="card shadow w-100">
            <div
                class="card-header border-bottom"
                style="
                    border-top-left-radius: 20px;
                    border-top-right-radius: 20px;
                    background-color: #fff;
                "
            >
                <h5 class="mb-0">Size Of Your Listing</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <fieldset class="" id="floor">
                            <legend
                                id="floor"
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Total Floor *
                            </legend>
                            <div class="">
                                <input
                                    id="floor"
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter total floors"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="" id=" TotalRoom">
                            <legend
                                id=" TotalRoom"
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Total Room *
                            </legend>
                            <div class="">
                                <input
                                    id=" TotalRoom"
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter total rooms"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="" id="Roomarea">
                            <legend
                                id="Roomarea"
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Room area *
                            </legend>
                            <div class="">
                                <input
                                    id="Roomarea"
                                    class="form-control"
                                    type="text"
                                    placeholder="Enter area in sq.ft"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow w-100" v-for="(typeroom, index) in typerooms" :key="index">
            <div
                class="card-header border-bottom d-flex justify-content-between align-items-center"
                style="
                    border-top-left-radius: 20px;
                    border-top-right-radius: 20px;
                    background-color: #fff;
                "
            >
                <h5 class="mb-0">Room Options</h5>
                <button v-if="index > 0" @click="removeRoom(index)" class="btn btn-danger btn-sm">
                    Delete Room
                </button>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <fieldset>
                            <legend
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Room name *
                            </legend>
                            <div>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="typeroom.name"
                                    placeholder="Enter name"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset>
                            <legend
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Room thumbnail image *
                            </legend>
                            <div>
                                <input
                                    type="file"
                                    class="form-control"
                                    @change="onFileChange($event, index)"
                                    accept="image/gif, image/jpeg, image/png"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset>
                            <legend
                                tabindex="-1"
                                class="form-label bv-no-focus-ring col-form-label pt-0"
                            >
                                Room Price *
                            </legend>
                            <div>
                                <input
                                    class="form-control"
                                    type="text"
                                    v-model="typeroom.price"
                                    placeholder="Enter price"
                                    style="border-radius: 10px; height: 40px"
                                />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <label for="CategorySelect">Tiện ích</label>
                        <v-multi-select
                            v-model="amenities"
                            :options="options"
                            mode="tags"
                            placeholder="Enter amenities "
                            style="border-radius: 10px; height: 40px"
                        >
                        </v-multi-select>
                        <!-- <v-errors :errors="errorFor('category')"></v-errors> -->
                    </div>

                    <!---list-->
                    <div id="app" class="col-md-12">
                        <div class="card w-100 m-0">
                            <div class="card-body">
                                <div class="container">
                                    <div class="bg-light rounded d-none d-lg-block">
                                        <div class="row g-4">
                                            <div class="col-sm-6 d-flex justify-content-center">
                                                <h6 class="mb-0">Name</h6>
                                            </div>
                                            <div class="col-sm-6 d-flex justify-content-center">
                                                <h6 class="mb-0">Action</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        v-for="(room, index) in rooms"
                                        :key="index"
                                        class="row g-4 mt-2"
                                    >
                                        <div class="col-sm-6 d-flex justify-content-center">
                                            <small class="d-block d-lg-none">Name</small>
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
                                                    class="btn btn-warning mb-0"
                                                    @click="startEdit(room)"
                                                >
                                                    Edit
                                                </button>
                                                <button
                                                    class="btn btn-danger mb-0"
                                                    @click="startDelete(index)"
                                                >
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-4 mt-4">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn btn-primary" @click="addRoom(index)">
                                                Add New Room
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
        <div class="card-body">
            <div class="col-12">
                <button @click="addtypeRoom" class="btn btn-sm btn-primary-soft mb-0">
                    <svg
                        width="1em"
                        height="1em"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        role="img"
                        focusable="false"
                        class="me-2"
                    >
                        <path
                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                        ></path>
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
                        ></path>
                    </svg>
                    Add New Option Room
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            options: [
                'Air Conditioning',
                'Room Services',
                'Dining',
                'Caretaker',
                'Free Internet',
                'Business Service',
                'Bonfire',
                'Mask',
                'Spa',
                'Swimming pool',
                'Fitness Centre',
                'Bar',
            ],
            typerooms: [{ name: '', image: '', price: '', rooms: [] }],
            rooms: [],
            content: null,
            amenities: null,
        };
    },
    methods: {
        addtypeRoom() {
            this.typerooms.push({ name: '', image: '', price: '', rooms: [] });
        },
        removeRoom(index) {
            this.typerooms.splice(index, 1);
        },
        onFileChange(event, index) {
            const file = event.target.files[0];
            if (file) {
                this.typerooms[index].image = URL.createObjectURL(file);
            }
        },
        addRoom() {
            this.rooms.push({ name: '' });
        },
        startEdit(room) {
            // Logic for editing the room can be implemented here
            alert(`Editing room: ${room.name}`);
        },
        startDelete(index) {
            if (this.rooms.length > 1) {
                this.rooms.splice(index, 1);
            }
        },
    },
};
</script>
