//用户
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
      if (state.data) return Promise.resolve(state.data)
      let response = await window.axios.get('user/get')
      commit('set', response.data.data)
      return response
    },
    adminLogout({ commit }) {
      commit('set', {})
      location.href = '/admin/login'
    }
  }
}
