<template>
    <div class="container">
        <div class="row g-4">
            <div
                v-for="(card, index) in paginatedCards"
                :key="index"
                class="col-md-6 col-xl-4"
                style="padding: 10px"
            >
                <div class="card shadow p-2 pb-0 w-100 h-100" style="border-radius: 1rem">
                    <img class="card-img-top card-img-custom" :src="card.image" :alt="card.title" />
                    <div class="card-body">
                        <h5 class="card-title">{{ card.title }}</h5>
                        <ul class="nav nav-divider mb-2 mb-sm-3">
                            <li
                                class="nav-item"
                                v-for="(feature, fIndex) in card.features"
                                :key="fIndex"
                            >
                                {{ feature }}
                            </li>
                        </ul>
                        <a :href="card.link" class="btn btn-primary">View detail</a>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item" :class="{ disabled: currentPage === 1 }">
                    <a class="page-link" @click="changePage(currentPage - 1)">Previous</a>
                </li>
                <li
                    v-for="page in totalPages"
                    :key="page"
                    class="page-item"
                    :class="{ active: currentPage === page }"
                >
                    <a class="page-link" @click="changePage(page)">{{ page }}</a>
                </li>
                <li class="page-item" :class="{ disabled: currentPage === totalPages }">
                    <a class="page-link" @click="changePage(currentPage + 1)">Next</a>
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
    },
    methods: {
        changePage(page) {
            if (page > 0 && page <= this.totalPages) {
                this.currentPage = page;
            }
        },
    },
};
</script>

<style>
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
.nav-item {
    font-size: 13px;
}
.nav-divider .nav-item + .nav-item:before {
    content: '•';
    padding: 0 0.7rem;
    opacity: 0.8;
}
</style>
