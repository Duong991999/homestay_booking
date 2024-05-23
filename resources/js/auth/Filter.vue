<template>
    <div id="collapseFilter" class="collapse show collapse" is-nav="false" style="">
        <div class="card bg-light p-4 mt-4 z-index-9 w-100" style="border-radius: 20px">
            <!----><!----><!---->
            <form class="row g-4 px-4">
                <div class="col-md-6 col-lg-4">
                    <div class="form-control-borderless">
                        <label class="form-label">Enter Hotel Name</label
                        ><input
                            type="text"
                            class="form-control form-control-lg"
                            style="border-radius: 15px"
                        />
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-control-borderless">
                        <label class="form-label">Price Range</label>
                        <div class="d-flex justify-content-between">
                            <span>$ 600</span><span>$ 1500</span>
                        </div>
                        <div>
                            <vue-slider v-model="value" :enable-cross="false"></vue-slider>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-size-lg form-control-borderless">
                        <label class="form-label">Popular Filters</label
                        ><!---->
                        <v-multi-select
                            v-model="selectedPopular"
                            placeholder="Select your character"
                            :options="PopularOptions"
                            mode="single"
                            id="popularSelect"
                            style="
                                border-top-left-radius: 15px;
                                border-top-right-radius: 15px;
                                height: 46px;
                            "
                        >
                        </v-multi-select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" style="padding-top: 30px">
                    <div class="form-control-borderless">
                        <label class="form-label">Customer Rating</label>
                        <ul class="list-inline mb-0 g-3">
                            <li class="list-inline-item">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="checkbox" checked /> 3
                                    </label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="checkbox" checked /> 3.5+
                                    </label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="checkbox" checked /> 4+
                                    </label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary active">
                                        <input type="checkbox" checked /> 4.5+
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" style="padding-top: 30px">
                    <div class="form-control-borderless">
                        <label class="form-label">Star Rating</label>
                        <ul class="list-inline mb-0 d-flex g-3 gap-1"></ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" style="padding-top: 30px">
                    <div class="form-size-lg form-control-borderless">
                        <label class="form-label">Homestay Type</label
                        ><!---->
                        <v-multi-select
                            v-model="selecteCategory"
                            placeholder="Select your character"
                            :options="CategoryOptions"
                            mode="single"
                            id="categorySelect"
                            style="
                                border-top-left-radius: 15px;
                                border-top-right-radius: 15px;
                                height: 46px;
                            "
                        >
                        </v-multi-select>
                    </div>
                </div>
                <div class="col-12" style="padding-top: 30px; padding-bottom: 30px">
                    <div class="form-control-borderless">
                        <label class="form-label">Amenities</label>
                        <div class="row g-3">
                            <div
                                v-for="(amenity, index) in amenities"
                                :key="index"
                                class="col-md-4 col-lg-3 col-xl-2 col-6"
                            >
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        :id="'flexCheckDefault-amenities' + index"
                                        :value="amenity"
                                    />
                                    <label
                                        class="form-check-label h6 fw-light mb-0"
                                        :for="'flexCheckDefault-amenities' + index"
                                    >
                                        {{ amenity }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button
                        class="btn btn-md btn-link p-0 mb-0 text-decoration-none"
                        type="button"
                        style="margin-right: 30px"
                    >
                        Clear all</button
                    ><button class="btn btn-dark mb-0 ms-3 text-decoration-none" type="button">
                        Apply filter
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
// module.exports = {
//     components: {
//         VueSlider,
//     },
//     data: function () {
//         return {
//             value: [0, 30],
//         };
//     },
// };
export default {
    data() {
        return {
            selectedPopular: null,
            PopularOptions: [
                'Batman',
                'Robin',
                'Joker',
                'District 1',
                'District 2',
                'District 3',
                'District 4',
                'District 5',
            ],
            selectedCategoryr: null,
            CategoryOptions: [
                'Batman',
                'Robin',
                'Joker',
                'District 1',
                'District 2',
                'District 3',
                'District 4',
                'District 5',
            ],
            amenities: [
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
            isFocused: false, // Track focus state
        };
    },
};
</script>
<style>
.list-inline-item {
    margin: 6px;
}
.btn-secondary:not(:disabled):not(.disabled).active {
    color: #000000;
    background-color: #ffffff;
    border-color: #ffffff;
}
.btn-secondary.focus {
    color: #2926e6;
    background-color: #d2edff;
    border-color: #2926e6;
}
.btn-secondary {
    color: #2926e6;
    background-color: #d2edff;
    border-color: #2926e6;
}
.btn-dark {
    color: #fff;
    background-color: #0a0d0e;
    border-color: #7b8a8b;
}
</style>
