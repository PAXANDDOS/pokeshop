import path from 'path'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import eslintPlugin from 'vite-plugin-eslint'

export default defineConfig({
	base: '/',
	build: {
		outDir: 'dist',
		assetsDir: 'assets',
		manifest: true,
		minify: 'esbuild',
	},
	publicDir: 'public',
	plugins: [vue(), eslintPlugin()],
	server: {
		host: '0.0.0.0',
		port: 3000,
		strictPort: true,
		open: true,
	},
	resolve: {
		alias: {
			'@': path.resolve(__dirname, './src'),
		},
	},
})
