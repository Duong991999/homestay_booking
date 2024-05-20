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
<<<<<<< HEAD
                    v-for="(item, index) in items"
=======
                    v-for="(homestay, index) in homestays"
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
                    :key="index"
                    class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4"
                >
                    <div class="col-sm-2 d-flex justify-content-center">
                        <small class="d-block d-lg-none">ID</small>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs flex-shrink-0"></div>
                            <div class="ms-2">
<<<<<<< HEAD
                                <h6 class="mb-0 fw-light">{{ item.id }}</h6>
=======
                                <h6 class="mb-0 fw-light">{{ homestay.id }}</h6>
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center">
                        <small class="d-block d-lg-none">Name</small>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xs flex-shrink-0"></div>
                            <div class="ms-2 d-flex justify-content-center">
<<<<<<< HEAD
                                <template v-if="selectedItem !== item">
                                    <h6 class="mb-0 fw-light">{{ item.name }}</h6>
                                </template>
                                <template v-else>
                                    <input
                                        v-model="editedItem.name"
                                        class="form-control"
                                        type="text"
                                    />
                                </template>
=======
                                <h6 class="mb-0 fw-light">{{ homestay.name }}123</h6>
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row d-flex justify-content-around">
<<<<<<< HEAD
                            <button
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-warning mb-0"
                                @click="startEdit(item)"
                                v-if="selectedItem !== item"
                            >
                                Edit
                            </button>
                            <template v-else>
                                <button
                                    href="#"
                                    class="router-link-active router-link-exact-active btn btn-primary mb-0"
                                    @click="saveEdit(item)"
                                >
                                    Save
                                </button>
                                <button
                                    href="#"
                                    class="router-link-active router-link-exact-active btn btn-danger mb-0"
                                    @click="cancelEdit"
                                >
                                    Cancel
                                </button>
                            </template>
                            <a
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-danger mb-0"
                                @click="deleteItem(item)"
=======
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
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
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
<<<<<<< HEAD
            items: [],
            selectedItem: null, // Track the selected item for editing
            editedItem: {
                id: '',
                name: '',
            }, // Track the edited item
=======
            homestays: [],
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        async fetchData() {
            try {
                const response = await axios.get('/api/admin/category/index');
<<<<<<< HEAD
                this.items = response.data.data;
=======
                this.homestays = response.data.data;
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
<<<<<<< HEAD
        startEdit(item) {
            this.selectedItem = item;
            this.editedItem = { ...item }; // Copy the item to be edited
        },
        async saveEdit() {
            try {
                const response = await axios.put(
                    `/api/admin/category/update/${this.editedItem.id}`,
                    this.editedItem
                );
                console.log('Item updated:', response.data);

                const index = this.items.findIndex((item) => item.id === this.editedItem.id);
                if (index !== -1) {
                    this.$set(this.items, index, this.editedItem);
                }

                this.selectedItem = null; // Reset selectedItem
            } catch (error) {
                console.error('Error updating item:', error);
            }
        },
        cancelEdit() {
            this.selectedItem = null;
=======
        showItem(item) {
            console.log('Show', Homestay);
        },
        updateItem(item) {
            console.log('Update', Homestay);
        },
        deleteItem(item) {
            console.log('Delete', Homestay);
>>>>>>> 3cc30bd1812c5fe2af29aaa4969cb99068c00153
        },
    },
};
</script>
