<template>
	<div v-if="loading" class="fullscreen-loader">
	  <div class="overlay"></div>
	  <div class="spinner">
		<pulse-loader :color="color"></pulse-loader>
	  </div>
	</div>
</template>
  
  <script>
  export default {
	data() {
	  return {
		loading: false,
		color: '#2c3e50',
	  };
	},
	props: ['loading'],
    methods: {
    },
  };
  </script>
  
  <style scoped>
  .fullscreen-loader {
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 9999;
  }
  
  .overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.5);
  }
  
  .spinner {
	z-index: 1;
  }
  </style>