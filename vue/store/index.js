import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        errors: {},
        user: window.user,
        //前台站点/登录注册与会员中心使用
        site: {},
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
        site(state, site) {
            state.site = site
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
        async site({ commit }) {
            commit('site', await axios.get(`site/current`))
        },
        async systemConfig({ commit }) {
            commit('systemConfig', await axios.get(`system/config`))
        }
    }
})
