<script>
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'CatalogCard',
	props: {
		product: {
			type: Object,
			isRequired: true,
		},
	},
})
</script>

<template>
	<router-link :to="{ name: 'Product', params: { id: product.id } }">
		<div class="single">
			<img :src="`/img/${product.image}`" alt="Product image" />
			<h3>{{ product.name }}</h3>
			<span>$ {{ product.price }}</span>
			<label>BUY</label>
		</div>
	</router-link>
</template>

<style scoped>
@import '../../assets/styles/catalog.css';
</style>
