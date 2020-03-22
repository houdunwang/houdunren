import Vue from 'vue'
import VueRouter from 'vue-router'
import admin from './admin'
import front from './front'
import store from '../store'
//注册组件
Vue.use(VueRouter)

const routes = [admin, front]

const router = new VueRouter({
  routes,
  mode: 'history'
})
router.beforeEach((to, from, next) => {
  store.dispatch('user/get').catch(error => {})
  //登录验证
  if (to.meta.auth) {
    store
      .dispatch('user/get')
      .then(() => next())
      .catch(() => (location.href = `/login?redirect=${to.path}`))
  } else {
    next()
  }
})
export default router
