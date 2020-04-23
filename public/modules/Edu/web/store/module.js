export default {
  namespaced: true,
  state: {
    module: {},
    menus: {}
  },
  mutations: {
    set(state, data) {
      state.module = data
    },
    setMenus(state, data) {
      state.menus = data
    }
  }
}
