//接口令牌
export default {
  headers() {
    return { Authorization: 'Bearer ' + this.get() }
  },
  set(accessToken) {
    window.localStorage.setItem('access_token', accessToken)
  },
  get() {
    return window.localStorage.getItem('access_token')
  },
  del() {
    window.localStorage.removeItem('access_token')
  }
}
