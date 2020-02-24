import token from "@/services/token";
import router from "@/router/index";
//用户
export default {
  namespaced: true,
  state: {
    data: null
  },
  mutations: {
    set(state, data) {
      state.data = data;
    }
  },
  actions: {
    async userLogin({ commit }, data) {
      let response = await window.axios.post("user/login", data);

      token.set(response.data.token);
      commit("set", response.data.data);
      return response;
    },
    async adminLogin({ commit }, data) {
      let response = await window.axios.post("system/login", data);

      token.set(response.data.token);
      commit("set", response.data.data);
      return response;
    },
    async get({ state, commit }) {
      if (state.data) return Promise.resolve(state.data);

      let response = await window.axios.get("user/get");
      commit("set", response.data.data);
      return response;
    },
    adminLogout({ commit }) {
      commit("set", {});
      token.del();
      router.push("/admin/login");
    }
  }
};
