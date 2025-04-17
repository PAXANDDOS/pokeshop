import { createStore } from 'vuex'

export default createStore({
	state: {
		cart: [],
	},
	getters: {
		totalQuantity: (state) =>
			state.cart.reduce((total, { quantity }) => total + quantity, 0),
		totalPrice: (state) =>
			state.cart.reduce(
				(total, { price, quantity }) => total + quantity * price,
				0
			),
		cartEmpty: (state) => !state.cart.length,
		inCart: (state) => (pid) => state.cart.find(({ id }) => pid === id),
	},
	mutations: {
		addToCart: (state, product) =>
			state.cart.push({
				...product,
				quantity: 1,
			}),
		removeFromCart: (state, index) => state.cart.splice(index, 1),
		incrementQuantity: (state, index) => {
			const product = state.cart[index]
			if (product.quantity === 10) return
			state.cart.splice(index, 1, {
				...product,
				quantity: product.quantity + 1,
			})
		},
		decrementQuantity: (state, index) => {
			const product = state.cart[index]
			if (product.quantity === 1) return
			state.cart.splice(index, 1, {
				...product,
				quantity: product.quantity - 1,
			})
		},
		clearCart: (state) => (state.cart = []),
	},
	actions: {},
	modules: {},
})
