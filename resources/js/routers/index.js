import Vue from "vue";
import VueRouter from "vue-router";
import NotFound from "../components/common/NotFound.vue";
import adminRouter from "./admin/index";
import accountRouter from "./account/index";

const routes = [
    adminRouter,
    ...accountRouter,
    { path: "*", component: NotFound }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

//注册组件
Vue.use(VueRouter);

// //使用next Promise跳转
// router.beforeEach((to, from, next) => {
//     let accessToken = AccessToken.get();
//     let LoginRouter = ["/login", "/register"].includes(to.path);
//     if (LoginRouter && accessToken) {
//         next("/admin");
//     } else if (!LoginRouter && !accessToken) {
//         next("/login");
//     } else {
//         next();
//     }
// });

export default router;
