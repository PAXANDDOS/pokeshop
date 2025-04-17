import axios from 'axios'

const apiClient = axios.create({
	baseURL: 'http://localhost:8000/api/orders',
	withCredentials: true,
	headers: {
		Accept: 'application/json',
		'Content-Type': 'application/json',
	},
})

export default {
	getOrders: (token) => {
		return apiClient.get('/', {
			headers: {
				Authorization: token,
			},
		})
	},
	getOrder: (id, token) => {
		return apiClient.get(`/${id}`, {
			headers: {
				Authorization: token,
			},
		})
	},
	submitOrder: (data, token) => {
		return apiClient.post('/', data, {
			headers: {
				Authorization: token,
			},
		})
	},
	deleteOrder: (id, token) => {
		return apiClient.delete(`/${id}`, {
			headers: {
				Authorization: token,
			},
		})
	},
}
