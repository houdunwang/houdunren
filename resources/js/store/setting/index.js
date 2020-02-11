import http from "../../services/http";
import data from "./data";
import { Message } from "element-ui";
export default {
    namespaced: true,
    state: { data },
    mutations: {
        update(state, data) {
            state.data = data;
        }
    },
    actions: {
        async get({ commit }) {
            let response = await http.get("/system/config");
            commit("update", response.data.data);
            return response;
        },
        async update({ state, commit }) {
            let response = await http.post("/system/config", {
                data: state.data
            });
            Message.success(response.data.message);
            commit("update", response.data.data);
            return response;
        }
    }
};
