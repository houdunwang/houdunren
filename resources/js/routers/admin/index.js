import Admin from "../../components/Admin.vue";
import site from "./site";
import user from "./user";
import setting from "./setting";
import store from "../../store";
import AccessToken from "../../services/AccessToken";

export default {
    path: "/admin",
    component: Admin,
    children: [...site, ...user, ...setting],
    async beforeEnter(to, form, next) {
        try {
            await Promise.all([
                store.dispatch("user/get"),
                store.dispatch("setting/get")
            ]);
            next();
        } catch (error) {
            console.error(error);
            AccessToken.del();
            next("/login");
        }
    },
};
