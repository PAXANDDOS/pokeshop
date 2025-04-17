<script>
import ProductService from '@/services/ProductService'
import { defineComponent } from 'vue'
import CatalogCard from './CatalogCard.vue'

export default defineComponent({
	name: 'CatalogList',
	components: {
		CatalogCard,
	},
	data() {
		return {
			catalog: null,
		}
	},
	created() {
		ProductService.getCatalog()
			.then((response) => {
				this.catalog = response.data
			})
			.catch((err) => {
				console.error(err)
			})
	},
})
</script>

<template>
	<div class="list">
		<div class="page_head">
			<div id="number">
				<h2>CATALOG</h2>
				<span><b>PRODUCTS:</b> ( 1 - {{ catalog?.length }} )</span>
			</div>
			<div id="pages">
				<span>SORT BY:</span>
				<select class="custom-select">
					<option>Revelance</option>
					<option>Price (low to high)</option>
					<option>Price (high to low)</option>
					<option>Newest</option>
					<option>Top Selling</option>
				</select>
				<span>ITEMS PER PAGE:</span>
				<select class="custom-select">
					<option>30</option>
					<option>60</option>
					<option>90</option>
				</select>
				<span>PAGE:</span>
				<select class="custom-select">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
				</select>
			</div>
		</div>
		<div class="page_body">
			<CatalogCard
				v-for="product in catalog"
				:key="product.id"
				:product="product"
			/>
		</div>
	</div>
</template>

<style scoped>
@import '../../assets/styles/catalog.css';
</style>
