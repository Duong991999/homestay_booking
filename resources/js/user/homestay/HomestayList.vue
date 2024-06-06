<template>
    <div class="container">
        <div class="row g-4">
            <div
                v-for="(card, index) in items"
                :key="index"
                class="col-md-6 col-xl-4"
                style="padding: 15px"
            >
                <div class="card shadow pb-0 w-100" style="border-radius: 1rem">
                    <img
                        class="card-img-top"
                        :src="card.file_path"
                        :alt="card.file_name"
                        style="border-top-left-radius: 1rem; border-top-right-radius: 1rem"
                    />
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ card.name }}</h5>
                        <small>Địa chỉ</small>
                        <small>{{card.address}}</small>

                        <ul class="nav nav-divider mb-2 mb-sm-3">
                            <div class="nav-item">
                                <li
                                    class="bg-success badge"
                                    v-for="(feature, fIndex) in card.features"
                                    :key="fIndex"
                                    style="font-size: 13px; margin: 5px"
                                >
                                    {{ feature }}
                                </li>
                            </div>
                        </ul>
                        <h6>{{ card.min_price }}-{{ card.max_price }}</h6>
                    </div>
                    <div class="card-footer border-top">
                        <div class="d-flex justify-content-between align-items-center">
							<router-link :to="{ name: 'detail', params: { id: card.id } }">Detail</router-link>
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
        };
    },
	props: {
		items: {
			type: Array,
			default: []
		}
	},
};
</script>

<style>
.card-body {
    padding-bottom: 0px;
}
.nav-item {
    font-size: 13px;
}

.pagination .page-item.disabled .page-link {
    pointer-events: none;
    opacity: 0.6;
}
.card-img-custom {
    height: 240px;
    border-radius: 0.5rem;
    object-fit: cover;
}
.card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.page-item.active .page-link {
    z-index: 3;
    color: hwb(0 34% 5%);
    background-color: rgb(237, 195, 169);
    border-color: transparent;
    border: 1px;
}
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: 0;
    line-height: 1.25;
    color: #dfa1a1;
    background-color: #f6f3f3;
    border-radius: 20px;
    border: 1px;
    border-color: #dfa1a1;
}
.page-item {
    margin: 10px;
}
.page-item.disabled .page-link {
    color: #ecf0f1;
    pointer-events: none;
    cursor: auto;
    background-color: #efacac;
    border-color: transparent;
}
</style>
