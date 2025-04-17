<script>
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'CartCard',
	props: {
		product: {
			type: Object,
			isRequired: true,
		},
	},
	emits: ['increment-quantity', 'decrement-quantity', 'remove-from-cart'],
})
</script>

<template>
	<div class="cartItem">
		<div class="cartItemLeft">
			<img :src="`/img/${product.image}`" />
			<h3>{{ product.name }}</h3>
		</div>
		<div class="cartItemRight">
			<span>$ {{ product.price }}</span>
			<div class="cartItemQuantity">
				<button @click.prevent="$emit('decrement-quantity')">
					&lsaquo;
				</button>
				<span>{{ product.quantity }}</span>
				<button @click.prevent="$emit('increment-quantity')">
					&rsaquo;
				</button>
			</div>
			<button @click="$emit('remove-from-cart')">&#10006;</button>
		</div>
	</div>
</template>

<style scoped>
@import '../../assets/styles/cart.css';
</style>
