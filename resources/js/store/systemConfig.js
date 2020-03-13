//系统配置
export default {
  namespaced: true,
  state: {
    data: null
  },
  mutations: {
    set(state, data) {
      state.data = data
    }
  },
  actions: {
    async get({ state, commit }) {
      let response = await window.axios.get('system/config/1')
      commit('set', response.data)
      return response.data
    }
  }
}
