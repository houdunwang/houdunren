import store from '@/store'
import Auth from '@/utils/Auth'
import router from '@/router'
const mixin = {
    computed: {
        user() {
            return Auth.user()
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
        removeToken() {
            window.localStorage.removeItem('token')
        }
    }
}

export default mixin
