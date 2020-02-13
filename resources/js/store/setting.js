import http from "../services/http";

export default {
    namespaced: true,
    state: {setting: null},

    mutations: {
        update(state, data) {
            state.setting = data;
        }
    },
    actions: {
        async get({state, commit}) {
            if (state.setting) return Promise.resolve(state.setting);

            let response = await http.get("/system/config");
            commit("update", response.data.data);
            return response;
        },
        async update({state, commit}) {
            let response = await http.post("/system/config", {
                data: state.setting
            });
            commit("update", response.data.data);
            return response;
        }
    }
};
