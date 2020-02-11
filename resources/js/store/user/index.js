import http from "../../services/http";
import AccessToken from "../../services/AccessToken";
import router from "../../routers/index";
import data from "./data";
export default {
    namespaced: true,
    state: { isLoad: true, data },
    mutations: {
        update(state, data) {
            state.isLoad = true;
            state.data = data;
        }
    },
    actions: {
        async login({ commit }, data) {
            let response = await http.post("/login", data);
            AccessToken.set(response.data.access_token);
            commit("update", response.data.user);
            return response;
        },
        async get({ state, commit }) {
            if (state.isLoad === true) return;

            let response = await http.get("/user/info");
            commit("update", response.data.data);
            return response;
        },
        logout() {
            AccessToken.del();
            router.push("/login");
        }
    }
};
