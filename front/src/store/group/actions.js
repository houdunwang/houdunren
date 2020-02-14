import {UPDATE_GROUP} from './mutation-types';
import * as api from './api'
import http from "../../services/http";

export async function all({state, commit}) {
    if (state.data) return Promise.resolve(state.data);

    let response = await http.get(api.GET_ALL);
    commit(UPDATE_GROUP, {data: response.data.data});
    return response.data;
}
