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
                                <h6 class="mb-0 fw-light">{{ index }}</h6>
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
                            <button
                                href="#"
                                class="router-link-active router-link-exact-active btn btn-warning mb-0"
                                @click="startEdit(item)"
                            >
                                Edit
                            </button>
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

        <!-- Edit Modal -->
        <div v-if="isEditModalVisible" class="modal-overlay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                        <button type="button" class="btn-close" @click="cancelEdit"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Name</label>
                            <input
                                v-model="editedItem.name"
                                type="text"
                                class="form-control"
                                id="itemName"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cancelEdit">
                            Cancel
                        </button>
                        <button type="button" class="btn btn-primary" @click="saveEdit">
                            Save
                        </button>
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
            isEditModalVisible: false, // Track modal visibility
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
            this.isEditModalVisible = true; // Show the modal
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
                this.fetchData();
                this.isEditModalVisible = false; // Hide the modal
            } catch (error) {
                console.error('Error updating item:', error);
            }
        },
        cancelEdit() {
            this.selectedItem = null;
            this.isEditModalVisible = false; // Hide the modal
        },
        deleteItem(item) {
            console.log('Delete', item);
            // Implement logic to delete item
        },
    },
};
</script>

<style scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
}
.modal-dialog {
    position: relative;
    max-width: 500px;
    width: 100%;
    background: white;
    border-radius: 5px;
}
</style>
