//表单验证错误信息
export default {
  namespaced: true,
  state: {
    data: {},
  },
  mutations: {
    set(state, data) {
      state.data = data;
    },
  }
};
