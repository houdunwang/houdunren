import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        user: {},
        site: window.site,
        module: window.module,
        siteMessage: {}
    },
    getters: {
        errors: state => name => {
            return state.errors[name] && state.errors[name][0]
        }
    },
    mutations: {
        errors(state, errors = {}) {
            state.errors = errors
        },
        user(state, user) {
            state.user = user
        },
        siteMessage(state, message) {
            state.messages = message
        }
    },
    actions: {
        async user({ commit }) {
            commit('user', await axios.get(`/api/user/info`))
        },
        async message({ commit }, page = 1) {
            commit('siteMessage', await axios.get(`message?page=${page}`))
        }
    }
})
