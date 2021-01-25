import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import store from '~/store'
Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

router.beforeEach((to, from, next) => {
    if (to.meta.auth && !store.getters.user) {
        location.href = '/login'
    } else {
        next()
    }
})

export default router
