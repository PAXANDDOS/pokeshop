<script>
import { defineComponent } from 'vue'
import OrderService from '@/services/OrderService'
import OrderCard from './OrderCard.vue'

export default defineComponent({
	name: 'OrderList',
	components: { OrderCard },
	data() {
		return {
			orders: null,
		}
	},
	created() {
		OrderService.getOrders(this.$cookie.getCookie('user').token)
			.then((res) => {
				this.orders = res.data
			})
			.catch((error) => {
				console.log(error)
			})
	},
})
</script>

<template>
	<div class="account-orders">
		<div class="account-orders-head">Your order history</div>
		<div class="account-orders-body">
			<OrderCard v-for="order in orders" :key="order.id" :order="order" />
			<span v-if="orders?.length === 0">
				You don't have any order yet.
			</span>
		</div>
	</div>
</template>

<style scoped>
@import '../../assets/styles/account.css';
</style>
