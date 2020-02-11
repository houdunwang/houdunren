import http from "../../services/http";
import data from "./data";
export default {
    namespaced: true,
    state: { isLoad: false, data },
    mutations: {
        update(state, data) {
            state.isLoad = true;
            state.data = data;
        }
    },
    actions: {
        async get({ state, commit }) {
            if (state.isLoad === true) return state;

            let response = await http.get("/system/group");
            commit("update", response.data.data);
            return response;
        }
    }
};
