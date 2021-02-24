import store from '../store'
import router from '../router'
const mixin = {
    computed: {
        site() {
            return store.state.site
        },
        module() {
            return store.state.module
        },
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
        errors(name) {
            return store.getters.errors(name)
        },
        //滚动到元素位置
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
            // await axios.get(`/api/logout`)
            // window.localStorage.removeItem('token')
            location.href = '/logout'
        }
    }
}

export default mixin
