import { MUTATE } from './mutation-types';

export default {

    [MUTATE](state, { data }) {
        state.data = data;
    },
};
