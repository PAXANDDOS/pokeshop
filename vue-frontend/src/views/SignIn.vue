<script>
import AuthService from '@/services/AuthService'
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'SignIn',
	data() {
		return {
			name: '',
			password: '',
		}
	},
	created() {
		if (this.$cookie.getCookie('user')) this.$router.replace('/')
	},
	methods: {
		signIn() {
			AuthService.signIn(this.name, this.password)
				.then((res) => {
					console.info(res.data.message)
					this.$cookie.setCookie('user', res.data.cookie, {
						expire: '2d',
						path: '/',
						secure: true,
						sameSite: true,
					})
					this.$router.push('/account')
				})
				.catch(({ response }) => console.error(response.data.message))
		},
	},
})
</script>

<template>
	<div class="breadcrumbs">
		<router-link to="/">Home</router-link>
		<span>/</span>
		<a>Sing in</a>
	</div>
	<div class="main">
		<div class="login">
			<h1>Welcome to PokeShop!</h1>
			<form @submit.prevent="signIn">
				<label>
					Your name<br />
					<input v-model="name" type="text" maxlength="10" required />
				</label>
				<label>
					Your password<br />
					<input
						v-model="password"
						type="password"
						minlength="8"
						maxlength="64"
						required
					/>
				</label>
				<input type="submit" value="Sign in" />
			</form>
			<span>
				Forgot your password?
				<router-link to="/signin">Let&apos;s get it back!</router-link>
			</span>
			<span>
				Not a member yet?
				<router-link to="/signup">Sign up!</router-link>
			</span>
		</div>
	</div>
</template>

<style scoped>
@import '../assets/styles/auth.css';
</style>
