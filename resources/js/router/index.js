import Vue from 'vue'
import VueRouter from 'vue-router'
import system from './system'
import site from './site'
import member from './member'
//注册组件
Vue.use(VueRouter)

const routes = [site, system, member]

export default new VueRouter({
  routes,
  mode: 'history'
})
