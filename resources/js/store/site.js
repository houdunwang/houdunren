import http from "../services/http";

export default {
    namespaced: true,
    state: {sites: null, site: null},

    mutations: {
        update(state, data) {
            state.sites = data;
        }
    },
    actions: {
        async getLists({state, commit}) {
            if (state.sites) return Promise.resolve(state.sites);

            let response = await http.get("/site/site");
            commit("update", response.data.data);
            return response;
        },
        async update({state, commit, dispatch}, data) {
            let response = await http.post(`/site/site/${id}`, {
                data
            });
            commit("update", response.data.data);
            return response;
        },
        async add({dispatch}, data) {
            let response = await http.post(`/site/site`, data);
            dispatch("getLists");
            return response;
        }
    }
};
