import Vue from "vue";
import VueRouter from "vue-router";
import NotFound from "../components/common/NotFound.vue";
import adminRouter from "./admin/index";
import accountRouter from "./account/index";
import App from '../components/App'

const routes = [
    {
        path: '/',
        component: App,
        redirect:'/admin',
        children: [
            adminRouter,
        ],
    },
    ...accountRouter,
    {path: "*", component: NotFound},
];

const router = new VueRouter({
    routes,
    mode: "history"
});

//注册组件
Vue.use(VueRouter);

export default router;
