import axios from 'axios'

const apiClient = axios.create({
	baseURL: 'http://localhost:8000/api/catalog',
	withCredentials: false,
	headers: {
		Accept: 'application/json',
		'Content-Type': 'application/json',
	},
})

export default {
	getCatalog: () => apiClient.get('/'),
	getProduct: (id) => apiClient.get(`/${id}`),
}
