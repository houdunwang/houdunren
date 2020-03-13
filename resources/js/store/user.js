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
      let response = await window.axios.get(`system/user`)

      commit('set', response.data)
      return response.data
    }
  }
}
