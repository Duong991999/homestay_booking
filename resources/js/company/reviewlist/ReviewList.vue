<template>
    <div class="row" style="margin-top: 80px">
        <div class="col-12">
            <div
                class="card rounded-3 w-100"
                style="border-color: black; border-width: 1px; border-radius: 10px"
            >
                <div
                    class="card-header border-bottom"
                    style="
                        border-color: black;
                        border-width: 1px;
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                    "
                >
                    <h4 class="title">Nhận xét</h4>
                </div>
                <div class="card-body mb-4 m-2">
                    <div v-for="(review, index) in reviews" :key="index" class="review-card">
                        <div
                            class="p-4"
                            style="
                                border-width: 1px;
                                border-radius: 10px;
                                background-color: #eff4e5;
                            "
                        >
                            <div class="d-sm-flex justify-content-between">
                                <div class="d-sm-flex align-items-center mb-3">
                                    <i class="fa-solid fa-user fa" style="color: #1e2b43"></i>
                                    <div
                                        class="d-flex justify-content-between align-items-center row"
                                        style="width: 700px"
                                    >
                                        <h5 class="ml-4 m-0" style="font-weight: bold">
                                            {{ review.author }}
                                        </h5>
                                        <div>
                                            <star-rating
                                                class="align-items-center"
                                                :star-size="20"
                                                :show-rating="false"
                                                v-model="review.rating"
                                                :read-only="true"
                                            ></star-rating>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4">{{ review.content }}</p>
                            <div v-if="review.images.length" class="row g-4">
                                <div v-for="(image, index) in review.images" :key="index">
                                    <a class="glightbox m-2" :href="image">
                                        <img :src="image" class="rounded" alt="" width="100" />
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-sm mb-0" @click="toggleReply(index)">
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            fill="currentColor"
                                            role="img"
                                            focusable="false"
                                            class="me-1"
                                        >
                                            <path
                                                d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.7 8.7 0 0 0-1.921-.306 7 7 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254l-.042-.028a.147.147 0 0 1 0-.252l.042-.028zM7.8 10.386q.103 0 .223.006c.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96z"
                                            ></path>
                                        </svg>
                                        Reply
                                    </button>
                                    <a
                                        aria-current="page"
                                        href="#"
                                        class="router-link-active router-link-exact-active text-primary-hover small mb-0 items-center"
                                        style="color: red"
                                    >
                                        <svg
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            fill="currentColor"
                                            role="img"
                                            focusable="false"
                                            class="me-1"
                                        >
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"
                                            ></path>
                                            <path
                                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"
                                            ></path>
                                        </svg>
                                        Report
                                    </a>
                                </div>
                                <div v-if="review.showReply" class="mt-3">
                                    <div class="d-flex mt-3">
                                        <textarea
                                            class="form-control mb-0"
                                            placeholder="Add a comment..."
                                            rows="2"
                                            wrap="soft"
                                            spellcheck="false"
                                            style="border-radius: 10px"
                                        ></textarea>
                                        <a
                                            class="btn btn-primary-soft btn-sm ms-2 px-4 mb-0 flex-shrink-0"
                                        >
                                            <img
                                                src="assets/image/icon/paper-plane.png"
                                                class="rounded"
                                                width="60"
                                                alt=""
                                        /></a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <hr v-if="index < reviews.length - 1" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating';
export default {
    name: 'Reviews',
    components: {
        StarRating,
    },
    data() {
        return {
            reviews: [
                {
                    author: 'Nguyễn Thị Lan',
                    date: '2 ngày trước',
                    resort: 'Khu nghỉ dưỡng và Spa Pride Moon Village',
                    content: `Tôi cảm thấy rất hài lòng với chuyến đi của mình. Nhân viên rất thân thiện và chu đáo, phòng ốc sạch sẽ và tiện nghi. Đặc biệt, view từ khách sạn nhìn ra biển rất tuyệt vời. Tôi sẽ giới thiệu cho bạn bè và gia đình đến đây nghỉ dưỡng.`,
                    images: ['assets/image/fake/fake1.jpg', 'assets/image/fake/fake2.jpg'],
                    showReply: false,
                    avatar: 'assets/image/icon/user.png',
                    rating: '4',
                },
                {
                    author: 'Lê Văn Tuấn',
                    date: '18 tháng 11, 2022 lúc 11:55',
                    resort: 'Courtyard by Marriott New York',
                    content: `Tôi đã có một kỳ nghỉ tuyệt vời tại đây. Vị trí khách sạn rất thuận tiện, chỉ cách trung tâm thành phố vài phút đi bộ. Phòng ốc sạch sẽ, hiện đại và có view nhìn ra công viên. Nhân viên phục vụ cũng rất chu đáo. Tôi sẽ quay lại đây vào lần sau.`,
                    images: [],
                    showReply: false,
                    avatar: 'assets/image/icon/user.png',
                    rating: '4',
                },
                {
                    author: 'Hoàng Thị Minh Anh',
                    date: '1 tuần trước',
                    resort: 'Resort Flamingo Đại Lải',
                    content: `Tôi rất hài lòng với chuyến đi đến Resort Flamingo Đại Lải. Không gian xanh mát, yên tĩnh và rất thư giãn. Nhân viên tại đây rất nhiệt tình, chu đáo. Phòng ốc rất sạch sẽ, hiện đại và tiện nghi. Tôi sẽ giới thiệu Resort này cho gia đình và bạn bè.`,
                    images: [
                        '/booking_v/assets/09-DF5sdfsd.jpg',
                        '/booking_v/assets/10-RTGVDSF.jpg',
                    ],
                    rating: '5',
                    showReply: false,
                    avatar: 'assets/image/icon/user.png',
                },
                {
                    author: 'Trần Văn Hùng',
                    date: '1 tháng trước',
                    resort: 'Khu nghỉ dưỡng Vinpearl Nha Trang',
                    content: `Tôi đã có trải nghiệm tuyệt vời khi nghỉ dưỡng tại Vinpearl Nha Trang. Khu resort rất rộng lớn, có nhiều tiện ích như bể bơi, phòng gym, spa... Nhân viên thân thiện và chuyên nghiệp. Phòng ốc sạch sẽ, tiện nghi và view nhìn ra biển rất đẹp. Tôi sẽ quay lại đây vào lần sau.`,
                    images: ['/booking_v/assets/11-DFGert.jpg', '/booking_v/assets/12-SFDfsdf.jpg'],
                    showReply: false,
                    avatar: 'assets/image/icon/user.png',
                    rating: '3',
                },
            ],
        };
    },
    methods: {
        toggleReply(index) {
            this.reviews[index].showReply = !this.reviews[index].showReply;
        },
    },
};
</script>

<style scoped>
.avatar-md {
    width: 50px;
    height: 50px;
}
</style>
