<script>
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'Home',
})
</script>

<template>
	<div class="breadcrumbs">
		<router-link to="/">Home</router-link>
	</div>
	<div class="main">
		<img
			class="welcomeBlockImg"
			src="/img/pokeball.png"
			alt="PokeShop logo"
		/>
		<div class="welcomeBlockText">
			<h2>Welcome to PokéShop</h2>
			<span>A lot of Pokémon stuff is waiting for you!</span
			><br /><br /><br /><br />
			<router-link :to="{ name: 'Catalog' }">Start shopping</router-link>
		</div>
	</div>
</template>

<style scoped>
@import '../assets/styles/welcome.css';
</style>
