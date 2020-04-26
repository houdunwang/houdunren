export default {
  namespaced: true,
  state: {
    site: {}
  },
  mutations: {
    set(state, data) {
      state.site = data
    }
  },
  actions: {
    async get({ commit }) {
      let response = await window.axios.get(`edu/front/site`)
      commit('set', response.data)
      return response
    }
  }
}
