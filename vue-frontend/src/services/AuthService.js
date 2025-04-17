import axios from 'axios'

const apiClient = axios.create({
	baseURL: 'http://localhost:8000/api/auth',
	withCredentials: true,
	headers: {
		Accept: 'application/json',
		'Content-Type': 'application/json',
	},
})

export default {
	signIn: (name, password) => {
		return apiClient.post('/signin', {
			name,
			password,
		})
	},
	signUp: (name, email, password, password_confirmation) => {
		return apiClient.post('/signup', {
			name,
			email,
			password,
			password_confirmation,
		})
	},
	signOut: (token) => {
		return apiClient.post('/signout', null, {
			headers: {
				Authorization: token,
			},
		})
	},
}
