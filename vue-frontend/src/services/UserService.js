import axios from 'axios'

const apiClient = axios.create({
	baseURL: 'http://localhost:8000/api/users',
	withCredentials: false,
	headers: {
		Accept: 'application/json',
		'Content-Type': 'application/json',
	},
})

export default {
	getUsers: () => apiClient.get('/'),
	getUser: (id) => apiClient.get(`/${id}`),
}
