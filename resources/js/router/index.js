import Vue from "vue";
import VueRouter from "vue-router";
import system from "./system";
import site from "./site";
import NotFound from "@/views/common/NotFound";
import module from './module'

const routes = [
  site, ...system, module,
  {path: '/', redirect: '/site/index'},
  {path: '*', component: NotFound}
];

const router = new VueRouter({
  routes,
  mode: "hash"
});

//注册组件
Vue.use(VueRouter);

export default router;
