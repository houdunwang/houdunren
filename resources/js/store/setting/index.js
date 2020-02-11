import http from "../../services/http";
import data from "./data";
import { Message } from "element-ui";
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
