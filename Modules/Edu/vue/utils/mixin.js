import store from '../store'
import router from '../router'
const mixin = {
    computed: {
        user() {
            return store.state.user
        },
        module() {
            return store.state.module
        },
        site() {
            return store.state.site
        },
        isLogin() {
            return window.localStorage.getItem('token')
        }
    },
    methods: {
        router(name, params = {}) {
            router.push({ name, params })
        },
        errors(name) {
            return store.getters.errors(name)
        },
        async logout() {
            await this.axios.get(`logout`)
            window.localStorage.removeItem('token')
            location.href = '/admin'
        }
    }
}

export default mixin
