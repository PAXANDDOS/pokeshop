<script>
import { defineComponent } from 'vue'
import CatalogFilters from '@/components/Catalog/CatalogFilters.vue'
import CatalogList from '@/components/Catalog/CatalogList.vue'

export default defineComponent({
	name: 'Catalog',
	components: {
		CatalogFilters,
		CatalogList,
	},
})
</script>

<template>
	<div class="breadcrumbs">
		<router-link to="/">Home</router-link>
		<span>/</span>
		<a>Catalog</a>
	</div>
	<div class="main">
		<CatalogFilters />
		<CatalogList />
	</div>
</template>

<style scoped>
@import '../assets/styles/catalog.css';
</style>
