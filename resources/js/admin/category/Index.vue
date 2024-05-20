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
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row d-flex justify-content-around">
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
            selectedItem: null, // Track the selected item for editing
            editedItem: {
                id: '',
                name: '',
            }, // Track the edited item
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        async fetchData() {
            try {
                const response = await axios.get('/api/admin/category/index');
                this.items = response.data.data;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        },
        startEdit(item) {
            this.selectedItem = item;
            this.editedItem = { ...item }; // Copy the item to be edited
        },
        async saveEdit() {
            try {
                const response = await axios.post(
                    `/api/admin/category/update/${this.editedItem.id}`,
                    this.editedItem
                );
                console.log('Item updated:', response.data);

                const index = this.items.findIndex((item) => item.id === this.editedItem.id);
                if (index !== -1) {
                    this.$set(this.items, index, this.editedItem);
                }

                this.selectedItem = null; // Reset selectedItem
				this.fetchData()
            } catch (error) {
                console.error('Error updating item:', error);
            }
        },
        cancelEdit() {
            this.selectedItem = null;
        },
        deleteItem(item) {
            console.log('Delete', item);
            // Implement logic to delete item
        },
    },
};
</script>
