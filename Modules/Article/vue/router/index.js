import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import store from '../store'
Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

const isLogin = window.uid
//路由拦截（守卫）
router.beforeEach(async (to, from, next) => {
    store.commit('errors')
    const auth = to.matched.some(route => route.meta.auth)
    const guest = to.matched.some(route => route.meta.guest)
    if (auth && isLogin) {
        await Promise.all([store.dispatch('user')])
    }
    if (auth && !isLogin) {
        //需要验证但未登录
        next('/login')
    } else if (guest && isLogin) {
        //该页面只能游客访问，但你已经登录了，就跳转到首页
        location.href = '/'
    } else {
        next()
    }
    next()
})

export default router
