import Vue from 'vue'
import VueRouter from 'vue-router'
import system from './system'
import site from './site'
import member from './member'
import account from './account'
import store from '@/store'
const routes = [system, site, member, account]
Vue.use(VueRouter)
const router = new VueRouter({
  routes,
  mode: 'history'
})

//路由检测
router.beforeEach(async (to, from, next) => {
  if (!store.state.user.data.id) {
    await store.dispatch('user/get')
  }
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
