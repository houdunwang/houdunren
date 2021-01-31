import store from '@/store'
import Auth from '@/utils/Auth'
const mixin = {
    computed: {
        Auth() {
            return Auth
        }
    },
    methods: {
        errors(name) {
            return store.getters.errors(name)
        }
    }
}

export default mixin
