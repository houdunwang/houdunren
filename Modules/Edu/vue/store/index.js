import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        user: window.user
        // site: window.site,
        // module: window.module,
    },
    getters: {
        errors: state => name => {
            return state.errors[name] && state.errors[name][0]
        }
        // user: state => {
        //     return state.user
        // }
        // token() {
        //     return window.localStorage.getItem('token') || null
        // }
    },
    mutations: {
        setErrors(state, errors = {}) {
            state.errors = errors
        }
        // setUser(state, user) {
        //     state.user = user
        // },
        // setSite(state, site) {
        //     state.site = site
        // },
        // setModule(state, module) {
        //     state.module = module
        // }
    },
    actions: {
        // async getUser({ commit }) {
        //     commit('setUser', await axios.get(`/api/user/info`))
        // }
        // async getModule({ commit }, url) {
        //     commit('setModule', await axios.get(url))
        // },
        // async getSite({ commit }, url) {
        //     commit('setSite', await axios.get(url))
        // }
    }
})
