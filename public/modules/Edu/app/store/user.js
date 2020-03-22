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
    /**
     * 获取用户资料
     * @param {*} param0
     */
    async get({ commit }) {
      try {
        let response = await window.axios.get(`member/get`)
        commit('set', response.data)
      } catch (error) {}
    }
  }
}
