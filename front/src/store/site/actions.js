import {UPDATE_SITE_LIST, UPDATE_CONFIG} from './mutation-types';
import http from "../../services/http";

export async function all({state, commit}, force = false) {
    if (state.data && force === false)
        return Promise.resolve(state.data);

    let response = await http.get("/site/site");
    commit(UPDATE_SITE_LIST, {data: response.data.data});
    return response.data.data;
}

export async function edit({state, dispatch}, site) {
    let response = await http.put(`/site/site/${site.id}`, site);
    await dispatch("all", true);
    return response;
}

export async function getConfig({state, commit, dispatch}, id) {
    let response = await http.get(`/site/config/${id}`);
    await commit(UPDATE_CONFIG, {data: response.data.data});
    return response;
}

export async function updateConfig({state, dispatch}, id) {
    let response = await http.put(`/site/config/${id}`, {
        config: state.config
    });
    await dispatch("getConfig", id);
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
