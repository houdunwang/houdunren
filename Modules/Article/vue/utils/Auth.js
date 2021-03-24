import store from '../store'
//用户管理
class Auth {
    user() {
        return store.state.user
    }
    id() {
        return store.state.user.id
    }
    check() {
        return Boolean(store.state.user.id)
    }
}

export default new Auth()
