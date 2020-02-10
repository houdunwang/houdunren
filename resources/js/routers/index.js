import Vue from "vue";
import VueRouter from "vue-router";
import Account from "./account";
import site from "./site";
import user from "./user";
import setting from "./setting";
import NotFound from "../components/common/NotFound.vue";
import Admin from "../components/Admin.vue";
import store from "../store/index";
import token from "../services/token";
const routes = [
    ...Account,
    {
        path: "/admin",
        name: "admin",
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

//使用next Promise跳转
router.beforeEach((to, from, next) => {
    store
        .dispatch("user/get")
        .then(() => {
            if (["/login", "/register"].includes(to.path)) {
                next("/admin");
            } else {
                next();
            }
        })
        .catch(_ => {
            token.del();
            if (["/login", "/register"].includes(to.path)) {
                next();
            } else {
                next("/login");
            }
        });
});

export default router;
