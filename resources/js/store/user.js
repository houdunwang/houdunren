//用户
import token from '@/services/token'
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
    async get({ commit }) {
      let response = await window.axios.get('member/user')
      commit('set', response.data)
      return response
    }
    // async systemLogin({ state, commit, dispatch }, form) {
    //   let response = await window.axios.post('system/login', form)
    //   token.set(response.data.token)
    //   dispatch('get')
    //   return response
    // }
  }
}
