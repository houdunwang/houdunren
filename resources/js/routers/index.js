import VueRouter from "vue-router";
import Account from "./account";
import user from "./user";
import NotFound from "../components/common/NotFound.vue";
// import Site from "../components/site/index.vue";
import Admin from "../components/Admin.vue";
import Site from "./site";

const routes = [
    ...Account,
    {
        path: "/",
        redirect: "/admin"
    },
    {
        path: "/admin",
        component: Admin,
        children: [...Site]
    },
    {
        path: "*",
        component: NotFound
    }
];
const router = new VueRouter({
    routes,
    mode: "hash"
});

export default router;
