import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '../router/routes'
import store from '../store'
Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history',
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
})

const isLogin = window.localStorage.getItem('token')
router.beforeEach(async (to, from, next) => {
    store.commit('errors')
    //用户经常被用到，所以登录用户在这里获取资料
    if (isLogin) await Promise.all([store.dispatch('user')])
    //匹配的路由列表中是否有需要验证的
    if (to.matched.some(route => route.meta.auth)) {
        window.sessionStorage.setItem('redirect_url', to.fullPath)
        isLogin ? next() : (location.href = `/login`)
    } else if (to.matched.some(route => route.meta.guest)) {
        //页面只能为游客访问时
        isLogin ? (location.href = '/') : next()
    } else {
        next()
    }
})

export default router
