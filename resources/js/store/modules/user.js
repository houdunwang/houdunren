import http from "../../services/http";
export default {
    namespaced: true,
    state: {
        user: {}
    },
    getters: {},
    mutations: {
        update(state, user) {
            state.user = user;
        }
    },
    actions: {
        login({ state, commit, rootState }, data) {
            return http.post("/login", data).then(response => {
                window.localStorage.setItem(
                    "token",
                    response.data.access_token
                );
                commit("update", response.data.user);
                return response;
            });
        },
        get({ state, commit, rootState }) {
            let user = state.user;
            // return user
            //     ? user:
            return http
                .get("/user/info")
                .then(response => {
                    commit("update", response.data);
                    return response.data;
                })
                .catch(error => {
                    return Promise.reject(error);
                });
        }
    },
    getters: {}
};
