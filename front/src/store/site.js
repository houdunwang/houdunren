//站点
export default {
  namespaced: true,
  state: {
    data: null,
  },
  mutations: {
    update(state, data) {
      state.data = data;
    }
  },
  actions: {
    async get({dispatch}, id) {
      let sites = await dispatch("all");
      return sites.find(site => site.id === id);
    },
  }
};

