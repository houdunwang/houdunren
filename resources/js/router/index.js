import Vue from 'vue'
import VueRouter from 'vue-router'
import system from './system'
import site from './site'

//注册组件
Vue.use(VueRouter)

const routes = [
  //直接访问后台时跳转到站点列表页
  { path: '/admin', redirect: '/admin/site/index' },
  site,
  system,
  { path: '*', redirect: '/admin/site/index' }
]

export default new VueRouter({
  routes,
  mode: 'history'
})
