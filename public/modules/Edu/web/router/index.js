import Vue from 'vue'
import VueRouter from 'vue-router'
import admin from './admin'
import front from './front'
import member from './member'
import store from '../store'
import store2 from 'store2'
//注册组件
Vue.use(VueRouter)

const routes = [admin, front, member]
const router = new VueRouter({
  routes,
  mode: 'history'
})

//路由检测
router.beforeEach(async (to, from, next) => {
  await store.dispatch('user/get')
  let isLogin = store.getters['user/isLogin']
  if (to.matched.some(record => record.meta.auth)) {
    if (!isLogin) {
      next({ name: 'login', query: { redirect: to.fullPath } })
    }
  }
  if (to.matched.some(record => record.meta.guest)) {
    if (isLogin) {
      location.href = from.fullPath
      return
    }
  }
  next()
})
export default router
