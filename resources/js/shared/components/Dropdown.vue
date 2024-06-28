<template>
    <div class="dropdown">
        <button
            class="dropdown-toggle btn btn-light"
            type="button"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            Quản lý
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a
                v-for="option in options"
                :key="option.value"
                :href="option.href"
                class="dropdown-item"
                >{{ option.label }}</a
            >
        </div>
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped>
/* Add custom dropdown styles if needed */
</style>
