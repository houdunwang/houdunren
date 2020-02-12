import http from "../services/http";

export default {
    namespaced: true,
    state: {groups: null},
    mutations: {
        update(state, data) {
            state.groups = data;
        }
    },
    actions: {
        async get({state, commit}) {
            if (state.groups) return Promise.resolve(state.groups);

            let response = await http.get("/system/group");
            commit("update", response.data.data);
            return response;
        }
    }
};
