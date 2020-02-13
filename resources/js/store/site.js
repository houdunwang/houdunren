import http from "../services/http";

export default {
    namespaced: true,
    state: { sites: null },
    mutations: {
        update(state, data) {
            state.sites = data;
        }
    },
    actions: {
        async getLists({ state, commit }, force = false) {
            if (state.sites && force === false)
                return Promise.resolve(state.sites);

            let response = await http.get("/site/site");
            commit("update", response.data.data);
            return response.data.data;
        },
        async edit({ dispatch }, data) {
            let response = await http.put(`/site/site/${data.id}`, data);
            await dispatch("getLists", true);
            return response;
        },
        async add({ dispatch }, data) {
            let response = await http.post(`/site/site`, data);
            await dispatch("getLists", true);
            return response;
        },
        async find({ dispatch }, id) {
            let sites = await dispatch("getLists");
            let site = sites.find(site => {
                return site.id == id;
            });
            return site;
        }
    }
};
