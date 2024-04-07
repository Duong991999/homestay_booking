<template>
    <div>
		<pulse-loader :loading="loading" :color="color"></pulse-loader>
    </div>
</template>

<script>
export default {
	data() {
		return {
			color: '#2c3e50',
		}
	},
    props: ['loading'],
    methods: {
    },
};
</script>

<style scoped>

</style>
