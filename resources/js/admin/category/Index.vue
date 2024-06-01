<template>
	<div class="card w-100" style="margin-top: 100px">
		<v-fullloading :loading="loading"></v-fullloading>
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
				<div v-for="(item, index) in items" :key="index"
					class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4">
					<div class="col-sm-2 d-flex justify-content-center">
						<small class="d-block d-lg-none">ID</small>
						<div class="d-flex align-items-center">
							<div class="avatar avatar-xs flex-shrink-0"></div>
							<div class="ms-2">
								<h6 class="mb-0 fw-light">{{ index + 1 }}</h6>
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
							<!-- Button trigger modal -->
							<button href="#" class="router-link-active router-link-exact-active btn btn-warning mb-0"
								@click="startEdit(item)">
								Edit
							</button>
							<button href="#" class="router-link-active router-link-exact-active btn btn-danger mb-0"
								@click="startDelete(item)">
								Delete
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<pagination :data="data" v-on:pagination-change-page="fetchData" align="center"></pagination>

		<!-- Edit Modal -->
		<transition name="modal-slide-fade">
			<div v-if="isEditModalVisible" class="modal-overlay">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editModalLabel">Edit Item</h5>
						</div>
						<div class="modal-body">
							<div class="mb-3">
								<label for="itemName" class="form-label">Name</label>
								<input v-model="editedItem.name" type="text" class="form-control" id="itemName" />
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
		</transition>
		<!-- Delete Modal -->
		<transition name="modal-slide-fade">
			<div v-if="isDeleteModalVisible" class="modal-overlay">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
						</div>
						<div class="modal-body">
							<p>Bạn xác nhận xóa Category Homestay này chứ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" @click="cancelDelete">
								Cancel
							</button>
							<button type="button" class="btn btn-danger" @click="confirmDelete">
								Delete
							</button>
						</div>
					</div>
				</div>
			</div>
		</transition>
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
			isEditModalVisible: false,
			isDeleteModalVisible: false, // Track modal visibility
			data: {},
			loading: false,
		};
	},
	mounted() {
		this.fetchData();
	},
	methods: {
		async fetchData(page = 1) {
			this.loading = true;
			try {
				const response = await axios.get(`/api/admin/category/index?page=${page}`);
				this.data = response.data.data;
				this.items = this.data.data
			} catch (error) {
				console.error('Error fetching data:', error);
			}
			this.loading = false;
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
		startDelete(item) {
			this.selectedItem = item; // Track the item to be deleted
			this.isDeleteModalVisible = true; // Show the delete modal
		},
		async confirmDelete() {
			try {
				await axios.post(`/api/admin/category/delete`);
				console.log('Item deleted');

				const index = this.items.findIndex((item) => item.id === this.selectedItem.id);
				if (index !== -1) {
					this.items.splice(index, 1); // Remove the item from the array
				}
				this.selectedItem = null; // Reset selectedItem
				this.isDeleteModalVisible = false; // Hide the delete modal
			} catch (error) {
				console.error('Error deleting item:', error);
			}
		},
		cancelDelete() {
			this.selectedItem = null;
			this.isDeleteModalVisible = false; // Hide the delete modal
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
.modal-slide-fade-enter-active,
.modal-slide-fade-leave-active {
	transition: opacity 0.3s ease, transform 0.3s ease;
}
.modal-slide-fade-enter,
.modal-slide-fade-leave-to {
	opacity: 0;
	transform: translateY(-20px);
}
</style>
