<script>
import { defineComponent } from 'vue'
import AccountBlock from '@/components/Account/AccountBlock.vue'
import OrderList from '@/components/Orders/OrderList.vue'

export default defineComponent({
	name: 'Account',
	components: { AccountBlock, OrderList },
	created() {
		if (!this.$cookie.getCookie('user')) this.$router.replace('/signin')
	},
})
</script>

<template>
	<div class="breadcrumbs">
		<router-link to="/">Home</router-link>
		<span>/</span>
		<a>Account</a>
	</div>
	<div class="main">
		<div class="account">
			<AccountBlock />
			<OrderList />
		</div>
	</div>
</template>

<style scoped>
@import '../assets/styles/account.css';
</style>
