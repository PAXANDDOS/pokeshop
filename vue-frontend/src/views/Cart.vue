<script>
import { defineComponent } from 'vue'
import CartCard from '@/components/Cart/CartCard.vue'
import CartForm from '@/components/Cart/CartForm.vue'

export default defineComponent({
	name: 'Cart',
	components: {
		CartCard,
		CartForm,
	},
	computed: {
		cart() {
			return this.$store.state.cart
		},
		cartEmpty() {
			return this.$store.getters.cartEmpty
		},
	},
})
</script>

<template>
	<div class="breadcrumbs">
		<router-link to="/">Home</router-link>
		<span>/</span>
		<a>Cart</a>
	</div>
	<div class="main">
		<div v-if="!cartEmpty" class="cartList">
			<CartCard
				v-for="(product, index) in cart"
				:key="product.id"
				:product="product"
				@increment-quantity="$store.commit('incrementQuantity', index)"
				@decrement-quantity="$store.commit('decrementQuantity', index)"
				@remove-from-cart="$store.commit('removeFromCart', index)"
			/>
		</div>
		<CartForm :cart="cart" :cart-empty="cartEmpty" />
	</div>
</template>

<style scoped>
@import '../assets/styles/cart.css';
</style>
