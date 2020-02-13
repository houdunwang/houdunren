import http from "../../services/http";
import AccessToken from "../../services/AccessToken";
import router from "../../routers";
import {UPDATE} from './mutation-types'

export async function login({commit}, data) {
    let response = await http.post("/login", data);

    AccessToken.set(response.data.access_token);
    commit(UPDATE, {data: response.data.user});
    return response;
}

export async function get({state, commit}) {
    if (state.data) return Promise.resolve(state.data);

    let response = await http.get("/user/info");
    commit(UPDATE, {data: response.data.data});
    return response;
}

export function logout() {
    AccessToken.del();
    router.push("/login");
}
