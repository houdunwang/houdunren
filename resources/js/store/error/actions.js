import { MUTATE } from './mutation-types';

export function set({ commit }, { data }) {
    commit(MUTATE, { data });
}
