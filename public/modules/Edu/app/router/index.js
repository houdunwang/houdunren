import Vue from 'vue'
import VueRouter from 'vue-router'
import admin from './admin'
//注册组件
Vue.use(VueRouter)

const routes = [admin]

export default new VueRouter({
  routes,
  mode: 'history'
})
