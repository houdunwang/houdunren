import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        site: window.site,
        module: window.module,
        user: window.user
    },
    getters: {
        errors: state => name => {
            return state.errors[name] && state.errors[name][0]
        },
        user: state => {
            return state.user
        },
        token() {
            return window.localStorage.getItem('token') || null
        }
    },
    mutations: {
        setErrors(state, errors = {}) {
            state.errors = errors
        },
        setUser(state, user) {
            state.user = user
        },
        setSite(state, site) {
            state.site = site
        },
        setModule(state, module) {
            state.module = module
        }
    },
    actions: {
        async getUser({ commit }) {
            commit('setUser', await axios.get(`/api/user/info`))
        },
        async getModule({ commit }) {
            commit('setModule', await axios.get(`/api/module/${window.localStorage.getItem('mid')}`))
        },
        async getSite({ commit }) {
            commit('setSite', await axios.get(`/api/site/${window.localStorage.getItem('sid')}`))
        }
    }
})
