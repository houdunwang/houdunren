import store from '../store'
import router from '../router'
import { MessageBox } from 'element-ui'
const mixin = {
    computed: {
        user() {
            return store.state.user
        },
        isLogin() {
            return this.user.id
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
            await this.axios.get(`front/logout`)
            window.localStorage.removeItem('token')
            location.href = '/'
        }
    }
}

export default mixin
