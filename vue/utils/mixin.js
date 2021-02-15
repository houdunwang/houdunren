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
        async confirm(message, promise) {
            return MessageBox.confirm(message, '温馨提示').then(_ => this.submit(promise))
        },
        route(name, params = {}) {
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
