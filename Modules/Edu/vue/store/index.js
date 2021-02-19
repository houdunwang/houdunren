import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        user: {},
        site: window.site,
        module: window.module,
        messages: {}
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
        },
        setUser(state, user) {
            state.user = user
        },
        setMessage(state, message) {
            state.messages = message
        }
        // setModule(state, module) {
        //     state.module = module
        // }
    },
    actions: {
        async getUser({ commit }) {
            commit('setUser', await axios.get(`/api/auth/user`))
        },
        async message({ commit }, page = 1) {
            commit('setMessage', await axios.get(`front/message?page=${page}`))
        }
        // async getModule({ commit }, url) {
        //     commit('setModule', await axios.get(url))
        // },
        // async getSite({ commit }, url) {
        //     commit('setSite', await axios.get(url))
        // }
    }
})
