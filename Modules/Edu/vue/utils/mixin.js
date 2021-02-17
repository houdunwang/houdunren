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
            return this.user.id
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
            await this.axios.get(`/api/front/logout`)
            window.localStorage.removeItem('token')
            location.href = '/'
        }
    }
}

export default mixin
