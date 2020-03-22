import Vue from 'vue'
import VueRouter from 'vue-router'
import system from './system'
import site from './site'
import member from './member'
import user from './user'

//注册组件
Vue.use(VueRouter)

const routes = [system, site, member, user]

export default new VueRouter({
  routes,
  mode: 'history'
})
