import Vue from "vue";
import VueRouter from "vue-router";
import Account from "./account";
import site from "./site";
import user from "./user";
import setting from "./setting";
import NotFound from "../components/common/NotFound.vue";
import Admin from "../components/Admin.vue";
const routes = [
    ...Account,
    {
        path: "/admin",
        component: Admin,
        children: [...site, ...user, ...setting]
    },

    {
        path: "*",
        component: NotFound
    }
];
const router = new VueRouter({
    routes,
    mode: "history"
});
//注册组件
Vue.use(VueRouter);
router.beforeEach((to, from, next) => {
    //登录注册不验证
    if (["/login", "/register"].includes(to.path)) {
        next();
    } else {
        const token = window.localStorage.getItem("token");
        token ? next() : next("/login");
    }
});
export default router;
