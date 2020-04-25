export default {
  namespaced: true,
  state: {
    status: false
  },
  mutations: {
    set(state, status) {
      state.status = status
    }
  }
}
