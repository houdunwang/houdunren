import {UPDATE_CONFIG} from './mutation-types';
import config from './data/config'

export default {
    [UPDATE_CONFIG](state, {data}) {
        state.data = {...config, ...data};
    },
};
