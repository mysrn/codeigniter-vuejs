import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'
import routes from '~pages'
import App from './App.vue'

import 'virtual:windi.css'
import './assets/css/main.scss'

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const baseURL = import.meta.env.VITE_APP_APIHOST

const app = createApp(App)
axios.defaults.baseURL = baseURL
axios.defaults.headers.common['Content-Type'] = 'application/json'
app.config.globalProperties.$axios = axios;
app.use(router)
app.mount('#app') 
