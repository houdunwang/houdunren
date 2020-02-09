import VueRouter from "vue-router";
import user from "./user";
import NotFound from "../components/common/NotFound.vue";
import Site from "../components/site/index.vue";
const routes = [
    ...user,
    {
        path: "/",
        name: "home",
        component: Site
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
