<script>
import AuthService from '@/services/AuthService'
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'AccountBlock',
	data() {
		return {
			user: this.$cookie.getCookie('user'),
		}
	},
	methods: {
		signOut() {
			AuthService.signOut(this.user.token).then((res) => {
				console.info(res.data.message)
				this.$cookie.removeCookie('user')
				location.href('/signin')
			})
		},
	},
})
</script>

<template>
	<div class="account-data">
		<div class="account-image"></div>
		<div class="account-main">
			<div class="account-info">
				<h2 class="account-info-name">Welcome, {{ user.name }}!</h2>
				<h2 class="account-info-name">{{ user.email }}</h2>
			</div>
			<button class="account-info-logout" @click="signOut">
				Sign out
			</button>
		</div>
	</div>
</template>

<style scoped>
@import '../../assets/styles/account.css';
</style>
