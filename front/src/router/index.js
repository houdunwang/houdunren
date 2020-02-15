import Vue from "vue";
import VueRouter from "vue-router";
import system from "./system";
import site from "./site";
import common from "./common";
import admin from './admin'

const routes = [
  {
    path: '/admin',
    redirect: '/site/index'
  },
  admin, site, system, common
];

const router = new VueRouter({
  routes,
  mode: "history"
});

//注册组件
Vue.use(VueRouter);

export default router;
