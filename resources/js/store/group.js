import http from "../services/http";
export default {
    namespaced: true,
    state: { groups: null },
    mutations: {
        update(state, data) {
            state.groups = data;
        }
    },
    actions: {
        async get({ state, commit }) {
            if (state.group) return Promise.resolve(state.group);

            let response = await http.get("/system/group");
            commit("update", response.data.data);
            return response;
        }
    }
};
