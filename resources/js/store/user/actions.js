import http from "../../services/http";
import Token from "../../services/Token";
import router from "../../routers";
import {UPDATE} from './mutation-types'

export async function userLogin({commit}, data) {
    let response = await http.post("/user/login", data);

    Token.set(response.data.access_token);
    const user =response.data.data;
    commit(UPDATE, {data: user});
    return user;
}

export async function adminLogin({commit}, data) {
    let response = await http.post("/admin/login", data);

    Token.set(response.data.access_token);
    const user =response.data.data;
    commit(UPDATE, {data: user});
    return user;
}

export async function get({state, commit}) {
    if (state.data) return Promise.resolve(state.data);

    let response = await http.get("/user/get");
    commit(UPDATE, {data: response.data.data});
    return response.data.data;
}

export function logout() {
    Token.del();
    router.push("/login");
}
