import store from '../store'
import router from '../router'
const mixin = {
    computed: {
        user() {
            return window.user
        },
        module() {
            return window.module
        },
        site() {
            return window.module
        }
    },
    methods: {
        router(name, params = {}) {
            router.push({ name, params })
        },
        errors(name) {
            return store.getters.errors(name)
        },
        isLogin() {
            return window.user.id
        },
        logout() {
            window.localStorage.removeItem('token')
            location.href = '/'
        }
    }
}

export default mixin
