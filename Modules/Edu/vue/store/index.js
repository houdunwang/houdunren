import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        site: {},
        module: {},
        user: {}
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
        setSite(state, site) {
            state.site = site
        },
        setModule(state, module) {
            state.module = module
        },
        setUser(state, user) {
            state.user = user
        }
    },
    actions: {
        async getSite({ commit }) {
            commit('setSite', await axios.get(`site/${window.sid}`))
        },
        async getModule({ commit }) {
            commit('setModule', await axios.get(`module/${window.mid}`))
        },
        async getUser({ commit }) {
            commit('setUser', await axios.get(`user/info`))
        },
        async getSystemConfig() {
            this.commit('setConfig', await axios.get(`system/config/1`))
        }
    }
})
