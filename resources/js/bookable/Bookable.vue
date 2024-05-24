<template>
    <div class="row g-4 g-xl-5">
        <div class="col-xl-7">
            <div class="card bg-transparent w-100 border-0" style="padding-right: 30px">
                <!----><!----><!---->
                <div class="card-header border-bottom bg-transparent px-0 pt-0">
                    <h3 class="mb-0 font-weight-bold">About This Hotel</h3>
                </div>
                <div class="card-body pt-4 p-0">
                    <!----><!---->
                    <h5 class="fw-light mb-4 font-weight-bold">Main Highlights</h5>
                    <p class="mb-3">
                        Demesne far-hearted suppose venture excited see had has. Dependent on so
                        extremely delivered by. Yet no jokes worse her why.
                        <b>Bed one supposing breakfast day fulfilled off depending questions.</b>
                    </p>
                    <p class="mb-0">
                        Delivered dejection necessary objection do Mr prevailed. Mr feeling does
                        chiefly cordial in do. Water timed folly right aware if oh truth. Large
                        above be to means. Dashwood does provide stronger is.
                    </p>
                    <div class="collapse" id="collapseContent">
                        <p class="my-3">
                            We focus a great deal on the understanding of behavioral psychology and
                            influence triggers which are crucial for becoming a well rounded Digital
                            Marketer. We understand that theory is important to build a solid
                            foundation, we understand that theory alone isn't going to get the job
                            done so that's why this rickets is packed with practical hands-on
                            examples that you can follow step by step.
                        </p>
                        <p class="mb-0">
                            Behavioral psychology and influence triggers which are crucial for
                            becoming a well rounded Digital Marketer. We understand that theory is
                            important to build a solid foundation, we understand that theory alone
                            isn't going to get the job done so that's why this tickets is packed
                            with practical hands-on examples that you can follow step by step.
                        </p>
                    </div>
                    <a
                        class="p-0 mb-4 mt-2 btn-more d-flex align-items-center collapsed"
                        data-bs-toggle="collapse"
                        href="#collapseContent"
                        role="button"
                        aria-expanded="false"
                        aria-controls="collapseContent"
                    >
                        See <span class="see-more ms-1">more</span
                        ><span class="see-less ms-1">less</span></a
                    >
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
        <div class="col-xl-5 order-xl-2"></div>
    </div>
</template>

<script>
import Amenities from './Amenities';
import Room from './Room';
export default {
    components: {
        Amenities,
        Room,
    },
    data() {
        return {
            advantages: [
                'Every hotel staff to have Proper PPT kit for COVID-19',
                'Every staff member wears face masks and gloves at all service times.',
                'Hotel staff ensures to maintain social distancing at all times.',
                'The hotel has In-Room Dining options available',
            ],
        };
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
