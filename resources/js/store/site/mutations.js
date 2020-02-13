import {UPDATE} from './mutation-types';

export default {

    [UPDATE](state, {data}) {
        state.data = data;
    },
};
