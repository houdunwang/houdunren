//站点
export default {
  state: {
    data: null,
  },
  namespaced: true,
  mutations: {
    update(state, {data}) {
      state.data = data;
    }
  },
  actions: {
    async all({state, commit}, force = false) {
      if (state.data && force === false)
        return Promise.resolve(state.data);

      let response = await window.axios.get("/site/site");
      commit('update', {data: response.data.data});
      return response.data.data;
    },
    async edit({state, dispatch}, site) {
      let response = await window.axios.put(`/site/site/${site.id}`, site);
      await dispatch("all", true);
      return response;
    },
    async add({dispatch}, data) {
      let response = await window.axios.post(`/site/site`, data);
      await dispatch("all", true);
      return response;
    },
    async find({dispatch}, id) {
      let sites = await dispatch("all");
      return sites.find(site => {
        return site.id === id;
      });
    },
    async del({dispatch}, id) {
      let response = await window.axios.delete(`/site/site/${id}`);
      await dispatch("all", true);
      return response;
    }
  }
};

