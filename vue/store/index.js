import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        errors: {},
        user: {},
        //系统配置
        systemConfig: {}
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
        systemConfig(state, config) {
            state.systemConfig = config
        }
    },
    actions: {
        async user({ commit }) {
            commit('user', await axios.get(`user/info`))
        },
        async systemConfig({ commit }) {
            commit('systemConfig', await axios.get(`system/config`))
        }
    }
})
