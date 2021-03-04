import Auth from '../utils/Auth'
import router from '../router'
import store from '../store'
export default {
    computed: {
        user() {
            return store.state.user
        },
        site() {
            return store.state.site
        },
        module() {
            return store.state.module
        },
        Auth() {
            return Auth
        },
        isLogin() {
            return window.uid
        }
    },
    methods: {
        router(name, params = {}) {
            router.push({ name, params })
        },
        errors(name) {
            return store.getters.errors(name)
        },
        logout() {
            location.href = '/logout'
        }
    }
}
