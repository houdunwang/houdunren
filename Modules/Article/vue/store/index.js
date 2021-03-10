import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        //表单验证错误
        errors: {},
        //登录用户
        user: {},
        site: window.site,
        module: window.module,
        //历史菜单
        historyMenus: []
    },
    getters: {
        //表单验证
        errors: state => name => state.errors[name] && state.errors[name][0]
    },
    //修改数据时使用，这是一个同步方法，不能在这里执行异步动作
    mutations: {
        //设置验证错误
        errors(state, errors = {}) {
            state.errors = errors
        },
        user(state, user) {
            state.user = user
        },
        site(state, site) {
            state.site = site
        },
        addHistoryMenus(state, menu) {
            const has = state.historyMenus.some(m => m.route.name == menu.route.name)
            if (!has) {
                state.historyMenus.push(menu)
                if (state.historyMenus.length > 10) {
                    state.historyMenus.shift()
                }
            }
        }
    },
    //用来执行异步动作
    actions: {
        async user({ commit }) {
            commit('user', await axios.get(`user/info`))
        },
        async site({ commit }) {
            commit('site', await axios.get(`site/current`))
        }
    }
})
