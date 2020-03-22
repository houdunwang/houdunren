import Vue from 'vue'
import VueRouter from 'vue-router'
import admin from './admin'
import front from './front'
//注册组件
Vue.use(VueRouter)

const routes = [admin, front]

export default new VueRouter({
  routes,
  mode: 'hash'
})
