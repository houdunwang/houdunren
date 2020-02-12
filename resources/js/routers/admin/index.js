import Admin from "../../components/Admin.vue";
import site from "./site";
import user from "./user";
import setting from "./setting";
import AccessToken from "../../services/AccessToken";
import store from "../../store/index";
export default {
    path: "/admin",
    component: Admin,
    children: [...site, ...user, ...setting],
    beforeEnter: (to, from, next) => {
        if (!AccessToken.get()) next("/login");
        store
            .dispatch("user/get")
            .then(() => {
                next();
            })
            .catch(() => {
                AccessToken.del();
                next("/login");
            });
    }
};
