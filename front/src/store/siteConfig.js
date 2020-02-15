//站点配置
export default {
  namespaced: true,
  state: {
    data: null,
  },
  mutations: {
    update(state, {data}) {
      state.config = {...config, ...data};
    }
  },
  actions: {
    async getConfig({state, commit, dispatch}, id) {
      let response = await http.get(`/site/config/${id}`)
      await commit(update, {data: response.data.data})
      return response
    },
    async updateConfig({state, dispatch}, id) {
      let response = await http.put(`/site/config/${id}`, {
        config: state.config
      })
      await dispatch('getConfig', id)
      return response
    }
  }
};

