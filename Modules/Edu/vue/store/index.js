import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        errors: {},
        site: window.site,
        module: window.module,
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
        setUser(state, user) {
            state.user = user
        }
    },
    actions: {
        async getUser({ commit }) {
            commit('setUser', await axios.get(`/api/user/info`))
        }
    }
})
