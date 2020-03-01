import Vue from 'vue'
import VueRouter from 'vue-router'
import system from './system'
import site from './site'
import module from './module'

//注册组件
Vue.use(VueRouter)

const routes = [site, system, module, { path: '*', redirect: '/admin/site/index' }]

export default new VueRouter({
  routes,
  mode: 'history'
})
