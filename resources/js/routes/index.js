import Vue from 'vue'
import VueRouter from 'vue-router'
import Base from '@/Pages/Member/Base/Form'

Vue.use(VueRouter)
const routes = [{ path: '/', component: Base }]

const router = new VueRouter({
    // mode: 'history',
    routes
})

export default router
