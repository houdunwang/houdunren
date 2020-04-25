import Token from '@/services/token'
export default {
  namespaced: true,
  state: {
    data: {}
  },
  mutations: {
    set(state, data) {
      state.data = data
    }
  },
  getters: {
    isLogin(state) {
      return state.data.id ? true : false
    },
    isSuperAdmin(state) {
      return state.data.is_super_admin ? true : false
    }
  },
  actions: {
    async get({ commit }) {
      if (Token.get()) {
        let response = await window.axios.get(`account/get`)
        commit('set', response.data)
        return response.data
      }
    },
    async login({}, form) {
      let response = await window.axios.post(`account/login`, form)
      Token.set(response.data.token)
      return true
    },
    async register({}, form) {
      let response = await window.axios.post(`account/register`, form)
      Token.set(response.data.token)
      return true
    },
    async logout({ state }) {
      await window.axios.get(`account/logout`)
      Token.del()
      location.href = '/'
    }
  }
}
