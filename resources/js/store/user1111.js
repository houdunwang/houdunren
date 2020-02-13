import http from "../services/http";
import AccessToken from "../services/AccessToken";
import router from "../routers/index";
export default {
    namespaced: true,
    state: { user: null },
    mutations: {
        update(state, data) {
            state.user = data;
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
            if (state.user) return Promise.resolve(state.user);

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
