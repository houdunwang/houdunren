import {UPDATE} from './mutation-types';
import http from "../../services/http";

export async function get({state, commit}) {
    if (state.data) return Promise.resolve(state.data);

    let response = await http.get("/system/config");

    commit(UPDATE, {data: response.data.data});
    return response;
}

export async function update({state, commit}) {

    let response = await http.post("/system/config", {
        data: state.setting
    });

    commit(UPDATE, {data: response.data.data});
    return response;
}
