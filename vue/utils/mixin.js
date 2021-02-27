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
        route(name, params = {}) {
            router.push({ name, params })
        },
        errors(name) {
            return store.getters.errors(name)
        },
        async logout() {
            location.href = '/logout'
        }
    }
}

export default mixin
