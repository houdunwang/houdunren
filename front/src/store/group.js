//用户组
export default {
  namespaced: true,
  state: {
    data: null
  },
  mutations: {
    update(state, data) {
      state.data = data;
    }
  },
  actions: {
    async all({state, commit}) {
      if (state.data) return Promise.resolve(state.data);

      let response = await http.get(api.GET_ALL);
      commit(update, response.data.data);
      return response.data;
    }
  },
};
