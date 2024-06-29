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
                        height="200px"
                        class="card-img-top"
                        :src="card.file_path"
                        :alt="card.file_name"
                        style="border-top-left-radius: 1rem; border-top-right-radius: 1rem"
                    />
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold text ml-2">{{ card.name }}</h5>
                        <h6 class="ml-2">{{ card.address }}</h6>

                        <ul class="nav nav-divider mb-2 mb-sm-3">
                            <div class="nav-item">
                                <li
                                    class="badge"
                                    v-for="(feature, fIndex) in card.features"
                                    :key="fIndex"
                                    style="
                                        font-size: 13px;
                                        margin: 5px;
                                        background-color: rgb(248 242 196);
                                    "
                                >
                                    {{ feature }}
                                </li>
                            </div>
                        </ul>
                        <div class="row d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 ml-3">
                                {{ card.min_price }} VND - {{ card.max_price }} VND
                            </h6>
                            <div class="mr-2">
                                <router-link
                                    class="btn-search p-2 text-decoration-none"
                                    :to="{ name: 'detail', params: { id: card.id } }"
                                    >Detail</router-link
                                >
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
        return {};
    },
    props: {
        items: {
            type: Array,
            default: [],
        },
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
.text {
    color: #543400fe;
}
.text:hover {
    color: #ffa217;
}
.btn-search {
    background-color: #fcad37;
    color: #513306;
    border-radius: 10px;
}
.btn-search:hover {
    background-color: #faf7df;
    color: #ffa217;
}
</style>
