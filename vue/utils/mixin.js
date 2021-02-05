import store from '../store'
import Auth from '../utils/Auth'
import router from '../router'
import { MessageBox } from 'element-ui'
const mixin = {
    data() {
        return {
            loading: true
        }
    },
    computed: {
        user() {
            return Auth.user()
        },
        Auth() {
            return Auth
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
        isLogin() {
            return Boolean(window.localStorage.getItem('token'))
        },
        logout() {
            window.localStorage.removeItem('token')
            location.href = '/'
        }
    }
}

export default mixin
