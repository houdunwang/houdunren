import {UPDATE_SITE_LIST, UPDATE_CONFIG} from './mutation-types';
import config from './data/config'

export default {

    [UPDATE_SITE_LIST](state, {data}) {
        state.data = data;
    },
    [UPDATE_CONFIG](state, {data}) {
        state.config = {...config, ...data};
    },
};
