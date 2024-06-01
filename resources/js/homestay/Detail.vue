<template>
    <div class="row g-4 g-xl-5">
        <div class="col-xl-7">
            <div class="card bg-transparent w-100 border-0" style="padding-right: 30px">
                <!----><!----><!---->
                <div class="card-header border-bottom bg-transparent px-0 pt-0">
                    <h3 class="mb-0 font-weight-bold">{{ homestay.name }}</h3>
                </div>
                <div class="card-body pt-4 p-0">
                    <!----><!---->
                    <div class="row">
                        <div class="col-6">
                            <h5 class="fw-light mb-4 font-weight-bold">Main Highlights</h5>
                        </div>
                        <div class="col-6">
                            <h6>Hình thức :{{ homestay.category }}</h6>
                        </div>
                    </div>
                    <p class="mb-3">
                        {{ homestay.content }}
                    </p>

                    <h5 class="fw-light mb-2 font-weight-bold">Advantages</h5>
                    <ul class="list-group list-group-borderless mb-0">
                        <li
                            v-for="(advantage, index) in advantages"
                            :key="index"
                            class="list-group-item h6 fw-light d-flex mb-0"
                        >
                            <svg
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                role="img"
                                focusable="false"
                                class="text-success me-2"
                                style="margin-right: 10px"
                            >
                                <path
                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"
                                ></path>
                            </svg>
                            {{ advantage }}
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <amenities></amenities>
            </div>
            <div><room></room></div>
        </div>
        <div class="col-xl-5 order-xl-2">
            <checkdate></checkdate>
        </div>
    </div>
</template>

<script>
import Amenities from './Amenities';
import Room from './Room';
import Checkdate from './Checkdate';
export default {
    components: {
        Amenities,
        Room,
        Checkdate,
    },
    data() {
        return {
            homestay: {
                name: null,
                content: null,
                city_code: null,
                district_code: null,
                ward_code: null,
                category_id: [],
                categories: [],
                files: [],
            },
            advantages: [
                'Every hotel staff to have Proper PPT kit for COVID-19',
                'Every staff member wears face masks and gloves at all service times.',
                'Hotel staff ensures to maintain social distancing at all times.',
                'The hotel has In-Room Dining options available',
            ],
        };
    },
    methods:{


    },
    async created() {
        if(this.$route.params.id){
            this.isCreate = false;
        }
		this.loading = true;
		await this.loadCategoryOptions();

        if(this.isCreate){
            this.title = 'create';
        }else{
            this.title = 'Update';
            await this.loadHomestay();

        }
		this.loading = false;
	},
};
</script>

<style scoped>
.warning {
    font-size: 0.7rem;
}
.list-group-borderless .list-group-item {
    border: none;
    padding: 0.425rem 0;
}
</style>
