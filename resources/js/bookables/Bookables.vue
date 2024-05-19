<template>
    <div>
        <v-fullloading :loading="loading"></v-fullloading>
        <div>
            <span
                style="
                    font-size: 24px;
                    line-height: 30px;
                    font-weight: 500;
                    color: rgb(42, 42, 46);
                    padding-bottom: 8px;
                    display: block;
                    text-align: center;
                "
            >
                Những nơi nghỉ dưỡng nổi bật
            </span>
            <div class="row" v-for="row in rows" :key="'row' + row">
                <div
                    class="col d-flex align-items-stretch"
                    v-for="(bookable, column) in bookablesInRow(row)"
                    :key="'row' + row + column"
                >
                    <bookable-list-item v-bind="bookable"></bookable-list-item>
                </div>

                <div
                    class="col"
                    v-for="p in placeholdersInRow(row)"
                    :key="'placeholder' + row + p"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
import BookableListItem from './BookableListItem';

export default {
    components: {
        BookableListItem,
    },
    data() {
        return {
            bookables: null,
            loading: false,
            columns: 1,
        };
    },
    computed: {
        rows() {
            return this.bookables === null ? 0 : Math.ceil(this.bookables.length / this.columns);
        },
    },
    methods: {
        bookablesInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        placeholdersInRow(row) {
            return this.columns - this.bookablesInRow(row).length;
        },
    },
    created() {
        // this.loading = true;
        // axios.get('/api/bookables').then((response) => {
        //     this.bookables = response.data.data;
        //     this.loading = false;
        // });
    },
};
</script>
