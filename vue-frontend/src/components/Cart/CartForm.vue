<script>
import OrderService from '@/services/OrderService'
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'CartForm',
	props: {
		cart: {
			type: Array,
			isRequired: true,
		},
		cartEmpty: {
			type: Boolean,
			isRequired: true,
		},
	},
	data() {
		return {
			user: this.$cookie.getCookie('user'),
		}
	},
	computed: {
		totalQuantity() {
			return this.$store.getters.totalQuantity
		},
		totalPrice() {
			return this.$store.getters.totalPrice
		},
	},
	methods: {
		submitOrder() {
			if (!this.$cookie.getCookie('user')) this.$router.push('/signin')
			else
				OrderService.submitOrder(this.cart, this.user.token).then(
					(res) => {
						console.info(res.data.message)
						this.$store.commit('clearCart')
					}
				)
		},
	},
})
</script>

<template>
	<div v-if="!cartEmpty" class="cartSubmit">
		<span>${{ totalPrice }} for {{ totalQuantity }} positions</span>
		<button type="submit" name="order" @click.prevent="submitOrder">
			Submit order
		</button>
	</div>
	<div v-else class="cartSubmit">
		<span style="border-radius: 10px">
			Nothing in cart yet, start shopping!
		</span>
	</div>
</template>

<style scoped>
@import '../../assets/styles/cart.css';
</style>
