<script>
import Header from './components/Base/Header.vue'
import Footer from './components/Base/Footer.vue'

export default {
	name: 'App',
	components: {
		Header,
		Footer,
	},
}
</script>

<template>
	<Header />
	<router-view />
	<Footer />
</template>

<style>
@import './assets/styles/style.css';
</style>
