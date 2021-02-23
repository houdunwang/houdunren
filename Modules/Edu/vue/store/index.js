import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        user: {},
        site: window.site,
        module: window.module,
        //站内消息
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
        siteMessage(state, siteMessage) {
            state.siteMessage = siteMessage
        }
    },
    actions: {
        async user({ commit }) {
            commit('user', await axios.get(`/api/user/info`))
        },
        //获取站内消息
        async siteMessage({ commit }, page = 1) {
            commit('siteMessage', await axios.get(`message?page=${page}`))
        }
    }
})
