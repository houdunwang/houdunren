//表单验证错误信息
export default {
  namespaced: true,
  state: {
    data: {},
  },
  mutations: {
    update(state, {data}) {
      state.data = data;
    },
  },
  actions: {
    set({commit}, data) {
      commit(MUTATE, data);
    }
  },
};
