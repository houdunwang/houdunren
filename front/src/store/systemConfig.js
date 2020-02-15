//系统配置
export default {
  namespaced: true,
  state: {
    data: null
  },
  mutations: {
    update(state, {data}) {
      state.data = {...config, ...data};
    },
  },
  actions: {
    async get({state, commit}) {
      if (state.data) return Promise.resolve(state.data);

      let response = await http.get("/system/config");
      commit(update, {data: response.data.data});
      return response;
    },
    async update({state, commit}) {
      let response = await http.post("/system/config", {
        data: state.data
      });

      commit(update, {data: response.data.data});
      return response;
    }
  }
};
