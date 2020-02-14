import Vue from "vue";
import VueRouter from "vue-router";
import admin from './admin/index'
import common from './common/index'
import site from './site/index'
import system from './system/index'

const routes = [
    system, admin, site, common,
];

const router = new VueRouter({
    routes,
    mode: "history"
});

//注册组件
Vue.use(VueRouter);

export default router;
