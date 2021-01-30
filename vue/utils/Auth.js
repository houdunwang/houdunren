import store from '@/store'
class Auth {
    id() {
        return store.state.user.id
    }
    user() {
        return store.state.user
    }
    check() {
        return Boolean(store.state.user.id)
    }
}

export default new Auth()
