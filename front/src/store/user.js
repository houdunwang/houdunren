import Vue from 'vue'
import token from '@/services/token'
//用户
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
    async userLogin({commit}, data) {
      let response = await window.axios.post("/user/login", data);

      token.set(response.data.access_token);
      const user = response.data.data;
      commit('update', {data: user});
      return user;
    },
    async adminLogin({commit}, data) {
      let response = await window.axios.post("/admin/login", data);

      token.set(response.data.token);
      const user = response.data.data;
      commit('update', {data: user});
      return user;
    },
    async get({state, commit}) {
      if (state.data) return Promise.resolve(state.data);

      let response = await window.axios.get("/user/get");
      commit('update', {data: response.data.data});
      return response.data.data;
    },
    logout() {
      Token.del();
      router.push("/login");
    }
  },
};
