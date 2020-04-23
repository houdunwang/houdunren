export default {
  namespaced: true,
  state: {
    site: {}
  },
  mutations: {
    set(state, data) {
      state.site = data
    }
  }
  //   actions: {
  //     async get({ commit }, sid) {
  //       let response = await window.axios.get(`module/site/admin?sid=${sid}`)
  //       commit('set', response.data)
  //     }
  //   }
}
