import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        //表单验证错误
        errors: {}
    },
    getters: {
        //获取验证错误
        errors: state => name => {
            return state.errors[name] && state.errors[name][0]
        },
        user: state => {
            return window.user
        },
        site: state => {
            return window.site
        }
    },
    mutations: {
        //设置验证错误
        setErrors(state, payload) {
            state.errors = payload.errors
        },
        setUser(state, user) {
            state.user = user
        }
    },
    actions: {
        async getUser({ commit }) {
            commit('setUser', await axios.get(`user/my`))
        }
    }
})
