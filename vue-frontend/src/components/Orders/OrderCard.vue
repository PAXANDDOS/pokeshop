<script>
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'OrderCard',
	props: {
		order: {
			type: Object,
			isRequired: true,
		},
	},
})
</script>

<template>
	<div class="account-order-object">
		<div class="account-order-objmain">
			<img
				:src="`/img/${order.image}`"
				class="account-order-image"
				alt="order-image"
			/>
			<div class="account-order-data">
				<label class="account-order-label">Order #{{ order.id }}</label>
				<h2 class="account-order-name">{{ order.name }}</h2>
				<span class="account-order-quantity"
					>Quantity: {{ order.quantity }}</span
				>
				<span class="account-order-price">$ {{ order.price }}</span>
			</div>
		</div>
		<span class="account-order-date"> {{ order.created_at }} </span>
	</div>
</template>

<style scoped>
@import '../../assets/styles/account.css';
</style>
