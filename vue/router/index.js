import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '../router/routes'
import store from '../store'
Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

const isLogin = store.getters.token

router.beforeEach(async (to, from, next) => {
    store.commit('setErrors')
    //用户经常被用到，所以登录用户在这里获取资料
    if (store.getters.token) {
        await Promise.all([store.dispatch('getUser')])
    }
    //匹配的路由列表中是否有需要验证的
    if (to.matched.some(route => route.meta.auth)) {
        if (!isLogin) {
            next({
                path: '/login',
                //登录成功后回跳地址
                redirect: to.fullPath
            })
        } else {
            next()
        }
    } else if (to.matched.some(route => route.meta.guest)) {
        //页面只能为游客访问时
        if (isLogin) {
            location.href = '/'
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router
