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
        scrollTo(el) {
            setTimeout(() => {
                const element = document.querySelector(el)
                if (element) {
                    const y = element.getBoundingClientRect().top + document.documentElement.scrollTop
                    document.documentElement.scroll({ top: y, behavior: 'smooth' })
                }
            })
        },
        async logout() {
            await axios.get(`/api/logout`)
            window.localStorage.removeItem('token')
            location.href = '/'
        }
    }
}

export default mixin
