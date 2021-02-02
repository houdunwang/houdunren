import store from '@/store'
import Auth from '@/utils/Auth'
import router from '@/router'
const mixin = {
    computed: {
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
        }
    }
}

export default mixin
