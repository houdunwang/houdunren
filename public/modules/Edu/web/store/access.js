export default {
  namespaced: true,
  state: {
    access: {},
    is_admin: false
  },
  mutations: {
    set(state, data) {
      state.access = data.access
      state.is_admin = data.is_admin
    }
  },
  actions: {
    async get({ commit }) {
      let response = await window.axios.get(`member/access`)
      commit('set', response.data)
      return response.data
    }
  }
}
