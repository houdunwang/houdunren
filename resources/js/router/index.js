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
  mode: 'history',
})
//元信息检测
// const isLogin = store.getters['user/isLogin']
// router.beforeEach((to, from, next) => {
//   //游客验证
//   if (to.meta.guest && isLogin === true) {
//     next(from.path)
//   }
//   if (to.meta.auth && isLogin === false) {
//     next({ path: 'login' })
//   }
//   console.log(to)

//   if (to.meta.auth && isLogin) {
//     alert(3)
//     store.dispatch('user/get')
//   }
//   next()
// })
export default router
