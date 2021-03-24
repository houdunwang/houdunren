import store from '../store'
import router from '../router'
const mixin = {
    computed: {
        user() {
            return store.state.user
        },
        isLogin() {
            return store.state.user.id
        }
    },
    methods: {
        router(name, params = {}) {
            router.push({ name, params })
        },
        route(name) {
            return this.$route.params[name]
        },
        query(name) {
            return this.$route.query[name]
        },
        errors(name) {
            return store.getters.errors(name)
        },
        logout() {
            location.href = '/logout'
        }
    }
}

export default mixin
