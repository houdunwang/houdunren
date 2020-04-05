import Token from '@/services/token'
export default {
  namespaced: true,
  state: {
    data: {},
  },
  mutations: {
    set(state, data) {
      state.data = data
    },
  },
  getters: {
    isLogin() {
      return Token.get() ? true : false
    },
  },
  actions: {
    async get({ commit }) {
      let response = await window.axios.get(`user/get`)
      commit('set', response.data)
      return response.data
    },
    async login({}, form) {
      let response = await window.axios.post(`user/login`, form)
      Token.set(response.data.token)
      return true
    },
  },
}
