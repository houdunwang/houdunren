import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        errors: {}
    },
    getters: {
        errors: state => name => {
            return state.errors[name] && state.errors[name][0]
        }
    },
    mutations: {
        //设置验证错误
        setErrors(state, payload) {
            state.errors = payload.errors
        }
    }
})
