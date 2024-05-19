<template>
    <div class="card w-100" style="margin-top: 100px">
        <div class="card-body">
            <div class="container">
                <div class="bg-light rounded p-3 d-none d-lg-block">
                    <div class="row row-cols-7 g-4">
                        <div class="col-sm-2 d-flex justify-content-center">
                            <h6 class="mb-0">ID</h6>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-center">
                            <h6 class="mb-0">Name</h6>
                        </div>
                        <div class="col-sm-4 d-flex justify-content-center">
                            <h6 class="mb-0">Action</h6>
                        </div>
                    </div>
                </div>
                <div
                    v-for="(homestay, index) in homestays"
                    :key="index"
                    class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4"
                >
                    <div class="col-sm-2 d-flex justify-content-center">
                        <small class="d-block d-lg-none">ID</small>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs flex-shrink-0"></div>
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light">{{ homestay.id }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center">
                        <small class="d-block d-lg-none">Name</small>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs flex-shrink-0"></div>
                            <div class="ms-2 d-flex justify-content-center">
                                <h6 class="mb-0 fw-light">{{ homestay.name }}123</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row d-flex justify-content-around">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-info mb-0"
                                @click="showHomestay(homestay)"
                            >
                                Show
                            </a>
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-warning mb-0"
                                @click="updateHomestay(item)"
                            >
                                Update
                            </a>
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-danger mb-0"
                                @click="deleteHomestay(item)"
                            >
                                Delete
                            </a>
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
            homestays: [],
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        async fetchData() {
            try {
                const response = await axios.get('/api/admin/category/index');
                this.homestays = response.data.data;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        showItem(item) {
            console.log('Show', Homestay);
        },
        updateItem(item) {
            console.log('Update', Homestay);
        },
        deleteItem(item) {
            console.log('Delete', Homestay);
        },
    },
};
</script>
