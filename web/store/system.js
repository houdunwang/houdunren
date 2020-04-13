//系统配置
export default {
  namespaced: true,
  state: {
    config: null,
  },
  mutations: {
    config(state, data) {
      state.config = data
    },
  },
  actions: {
    async getConfig({ commit }) {
      let response = await window.axios.get('system/config/1')
      commit('config', response.data)
      return response.data
    },
  },
}
