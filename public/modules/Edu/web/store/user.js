import Token from '@/services/token'
export default {
  namespaced: true,
  state: {
    user: {}
  },
  mutations: {
    set(state, data) {
      state.user = data
    }
  },
  getters: {
    isLogin() {
      return Token.get() ? true : false
    },
    isSuperAdmin(state) {
      return state.user.is_super_admin ? true : false
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
    async logout({}) {
      await window.axios.get(`account/logout`)
      Token.del()
      location.href = '/'
    }
  }
}
