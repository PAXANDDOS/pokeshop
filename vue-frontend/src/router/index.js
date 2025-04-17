import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import Catalog from '@/views/Catalog.vue'
import Product from '@/views/Product.vue'
import SignIn from '@/views/Signin.vue'
import SignUp from '@/views/SignUp.vue'
import Account from '@/views/Account.vue'
import Cart from '@/views/Cart.vue'
import NotFound from '@/views/NotFound.vue'

export default createRouter({
	history: createWebHistory(),
	routes: [
		{
			path: '/',
			name: 'Home',
			component: Home,
		},
		{
			path: '/catalog',
			name: 'Catalog',
			component: Catalog,
		},
		{
			path: '/catalog/:id',
			name: 'Product',
			props: true,
			component: Product,
		},
		{
			path: '/signin',
			name: 'SignIn',
			component: SignIn,
		},
		{
			path: '/signup',
			name: 'SignUp',
			component: SignUp,
		},
		{
			path: '/account',
			name: 'Account',
			component: Account,
		},
		{
			path: '/cart',
			name: 'Cart',
			component: Cart,
		},
		{
			path: '/:pathMatch(.*)*',
			name: 'NotFound',
			component: NotFound,
		},
	],
})
