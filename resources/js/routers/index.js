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

export default router;
