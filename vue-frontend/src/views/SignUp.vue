<script>
import AuthService from '@/services/AuthService'
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'SignUp',
	data() {
		return {
			name: '',
			email: '',
			password: '',
			password_confirmation: '',
		}
	},
	created() {
		if (this.$cookie.getCookie('user')) this.$router.replace('/')
	},
	methods: {
		signUp() {
			AuthService.signUp(
				this.name,
				this.email,
				this.password,
				this.password_confirmation
			)
				.then((res) => {
					console.info(res.data.message)
					this.$router.push('/signin')
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
			<form @submit.prevent="signUp">
				<label>
					Your name<br />
					<input v-model="name" type="text" maxlength="10" required />
				</label>
				<label>
					Your email<br />
					<input
						v-model="email"
						type="email"
						maxlength="32"
						required
					/>
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
				<label>
					Repeat your password<br />
					<input
						v-model="password_confirmation"
						type="password"
						minlength="8"
						maxlength="64"
						required
					/>
				</label>
				<input type="submit" value="Sign up" />
			</form>
			<span>
				Already a member?
				<router-link to="/signin">Sign in!</router-link>
			</span>
		</div>
	</div>
</template>

<style scoped>
@import '../assets/styles/auth.css';
</style>
