import {UPDATE} from './mutation-types';
import http from "../../services/http";


export async function all({state, commit}, force = false) {
    if (state.data && force === false)
        return Promise.resolve(state.data);

    let response = await http.get("/site/site");
    commit(UPDATE, {data: response.data.data});
    return response.data.data;
}

export async function edit({dispatch}, data) {
    let response = await http.put(`/site/site/${data.id}`, data);
    await dispatch("all", true);
    return response;
}

export async function add({dispatch}, data) {
    let response = await http.post(`/site/site`, data);
    await dispatch("all", true);
    return response;
}

export async function find({dispatch}, id) {
    let sites = await dispatch("all");
    let site = sites.find(site => {
        return site.id == id;
    });
    return site;
}

export async function del({dispatch}, id) {
    let response = await http.delete(`/site/site/${id}`);
    await dispatch("all", true);
    return response;
}
