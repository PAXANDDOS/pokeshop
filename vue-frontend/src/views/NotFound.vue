<script>
import { defineComponent } from 'vue'

export default defineComponent({
	name: 'NotFound',
})
</script>

<template>
	<h1>404</h1>
	<span>Page not found &#9785;</span>
	<router-link to="/">Go home</router-link>
</template>
