<template>
    <div class="container">
        <div class="row g-4">
            <div
                v-for="(card, index) in paginatedCards"
                :key="index"
                class="col-md-6 col-xl-4"
                style="padding: 15px"
            >
                <div class="card shadow pb-0 w-100 h-100" style="border-radius: 1rem">
                    <img
                        class="card-img-top"
                        :src="card.image"
                        :alt="card.title"
                        style="border-top-left-radius: 1rem; border-top-right-radius: 1rem"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ card.title }}</h5>
                        <small>Địa chỉ</small>
                        <h6 class="">Catelory</h6>

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
                        <h6>Giá</h6>
                    </div>
                    <div class="card-footer border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <a
                                href="/booking_v/directories/detail"
                                class="btn btn-link p-0 mb-0 items-center"
                            >
                                View detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item" :class="{ disabled: currentPage === 1 }">
                    <a class="page-link" @click="changePage(currentPage - 1)"><</a>
                </li>
                <li
                    v-for="page in pagesToShow"
                    :key="page"
                    class="page-item"
                    :class="{ active: currentPage === page }"
                >
                    <a class="page-link" @click="changePage(page)">{{ page }}</a>
                </li>
                <li class="page-item" :class="{ disabled: currentPage === totalPages }">
                    <a class="page-link" @click="changePage(currentPage + 1)">></a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cards: [
                // Danh sách các thẻ (khoảng 20-30 thẻ để thử nghiệm phân trang)
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_3.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_3.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_3.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_0.jpg',
                    title: 'Card title 1',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_1.jpg',
                    title: 'Card title 2',
                    features: ['Air Conditioning', 'Wifi', 'Gym'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 3',
                    features: ['Air Conditioning', 'Wifi', 'Kitchen', 'Garden'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 4',
                    features: ['Wifi', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 5',
                    features: ['Air Conditioning', 'Kitchen', 'Pool'],
                    link: '#',
                },
                {
                    image: 'assets/image/slide_home_screens/_2.jpg',
                    title: 'Card title 6',
                    features: ['Air Conditioning', 'Wifi', 'Gym', 'Pool'],
                    link: '#',
                },
            ],
            currentPage: 1,
            itemsPerPage: 9,
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.cards.length / this.itemsPerPage);
        },
        paginatedCards() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.cards.slice(start, end);
        },
        pagesToShow() {
            const pages = [];
            const total = this.totalPages;
            const current = this.currentPage;
            if (total <= 5) {
                for (let i = 1; i <= total; i++) {
                    pages.push(i);
                }
            } else {
                if (current <= 3) {
                    pages.push(1, 2, 3, 4, '...', total);
                } else if (current >= total - 2) {
                    pages.push(1, '...', total - 3, total - 2, total - 1, total);
                } else {
                    pages.push(1, '...', current - 1, current, current + 1, '...', total);
                }
            }
            return pages;
        },
    },
    methods: {
        changePage(page) {
            if (page === '...') return;
            if (page > 0 && page <= this.totalPages) {
                this.currentPage = page;
            }
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
</style>
