import Token from '@/services/token'
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
    },
    async login({ commit }, form) {
      let response = await window.axios.post(`user/login`, form)
      commit('set', response.data.user)
      Token.set(response.data.token)
    }
  }
}
