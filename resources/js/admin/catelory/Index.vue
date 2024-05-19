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
                    v-for="(item, index) in items"
                    :key="index"
                    class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4"
                >
                    <div class="col-sm-2 d-flex justify-content-center">
                        <small class="d-block d-lg-none">ID</small>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs flex-shrink-0"></div>
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light">{{ item.id }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center">
                        <small class="d-block d-lg-none">Name</small>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs flex-shrink-0"></div>
                            <div class="ms-2 d-flex justify-content-center">
                                <h6 class="mb-0 fw-light">{{ item.name }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row d-flex justify-content-around">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-info mb-0"
                                @click="showItem(item)"
                            >
                                Show
                            </a>
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-warning mb-0"
                                @click="updateItem(item)"
                            >
                                Update
                            </a>
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-danger mb-0"
                                @click="deleteItem(item)"
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
            items: [],
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        async fetchData() {
            try {
                const response = await axios.post('/api/admin/category/index'); 
                this.items = response.data;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        showItem(item) {
            console.log('Show', item);
        },
        updateItem(item) {
            console.log('Update', item);
        },
        deleteItem(item) {
            console.log('Delete', item);
        },
    },
};
</script>
