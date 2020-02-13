import {UPDATE_GROUP} from './mutation-types';

export default {
    [UPDATE_GROUP](state, {data}) {
        state.data = data;
    },
};
