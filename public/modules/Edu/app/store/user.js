export default {
  namespaced: true,
  state: {
    user: {}
  },
  getters: {
    //登录检测
    isLogin(state) {
      return Boolean(state.user.id)
    }
  },
  mutations: {
    set(state, user) {
      state.user = user
    }
  },
  actions: {
    /**
     * 获取用户资料
     * @param {*} param0
     */
    get({ commit }) {
      return window.axios.get(`member/get`).then(response => {
        commit('set', response.data.data)
      })
    }
  }
}
