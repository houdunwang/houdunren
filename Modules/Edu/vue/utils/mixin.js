import store from '../store'
import Auth from '../utils/Auth'
import router from '../router'
const mixin = {
    computed: {
        user() {
            return Auth.user()
        },
        module() {
            return store.state.module
        },
        site() {
            return store.state.site
        },
        Auth() {
            return Auth
        }
    },
    methods: {
        route(name, params = {}) {
            router.push({ name, params })
        },
        errors(name) {
            return store.getters.errors(name)
        },
        isLogin() {
            return Boolean(window.localStorage.getItem('token'))
        },
        logout() {
            window.localStorage.removeItem('token')
            location.href = '/'
        }
    }
}

export default mixin
