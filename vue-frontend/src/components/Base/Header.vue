<script>
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'Header',
})
</script>

<template>
	<div class="header">
		<div class="logo">
			<img src="/img/pokeball.png" alt="PokeShop logo" />
			<span>PokéShop</span>
		</div>
		<div class="info">
			<router-link :to="{ name: 'Home' }">ABOUT</router-link>
			<router-link :to="{ name: 'Catalog' }">CATALOG</router-link>
			<a href="https://github.com/PAXANDDOS">CONTACT</a>
		</div>
		<div class="search">
			<input
				type="search"
				placeholder="Search Pikachu, Plush, T-Shirts..."
			/>
		</div>
		<div class="user">
			<router-link :to="{ name: 'Cart' }">CART</router-link>
			<router-link
				v-if="!$cookie.getCookie('user')"
				:to="{ name: 'SignIn' }"
				>SIGN IN</router-link
			>
			<router-link v-else :to="{ name: 'Account' }">ACCOUNT</router-link>
		</div>
	</div>
</template>

<style>
@import '../../assets/styles/style.css';
</style>
