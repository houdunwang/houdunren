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
        setErrors(state, errors = {}) {
            state.errors = errors
        },
        setUser(state, user) {
            state.user = user
        },
        setSystemConfig(state, config) {
            state.systemConfig = config
        }
    },
    actions: {
        async getUser({ commit }) {
            commit('setUser', await axios.get(`auth/user`))
        }
    }
})
