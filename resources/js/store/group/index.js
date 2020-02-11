import http from "../../services/http";
export default {
    namespaced: true,
    state: {
        data: []
    },
    mutations: {
        update(state, data) {
            state.data = data;
        }
    },
    actions: {
        async get({ commit }) {
            let response = await http.get("/system/group");
            commit("update", response.data.data);
            return response;
        }
    }
};
