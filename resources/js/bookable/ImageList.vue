<template>
    <div class="photo-list">
        <div v-for="(photo, index) in photos" :key="index" class="photo-item">
            <img
                class="d-block w-100"
                :src="`assets/image/slide_home_screens/${photo}`"
                :alt="`Slide ${index}`"
            />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        photos: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped>
.photo-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.photo-item {
    flex-basis: calc(33.33% - 10px); /* Adjust the width of each photo item */
    margin-bottom: 20px;
}

.photo-img {
    width: 100%;
    height: auto;
}
</style>
