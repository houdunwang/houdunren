import Vue from 'vue'
import VueRouter from 'vue-router'
import admin from './admin'
Vue.use(VueRouter)

const routes = [admin]

const router = new VueRouter({
  routes
})

export default router
