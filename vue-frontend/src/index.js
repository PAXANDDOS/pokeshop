import { createApp } from 'vue'
import { VueCookieNext as cookie } from 'vue-cookie-next'
import App from './App.vue'
import router from './router'
import store from './store'

createApp(App).use(store).use(router).use(cookie).mount('#root')
