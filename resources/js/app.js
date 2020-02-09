require("./bootstrap");
window.Vue = require("vue");
import App from "./components/App.vue";
import Vue from "vue";
import VueRouter from "vue-router";
import router from "./routers/index.js";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";

Vue.use(ElementUI);
Vue.use(VueRouter);
Vue.component("app", App);

const app = new Vue({
    el: "#app",
    router
});
