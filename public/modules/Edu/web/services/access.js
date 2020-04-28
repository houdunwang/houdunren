import store from '@/store'
export default {
  /**
   * 管理员检测
   */
  isAdmin() {
    return store.state.access.is_admin
  },
  /**
   * 权限检测
   * @param string name 权限标识
   */
  access(name) {
    let access = store.state.access.access
    return access.some(a => a == name)
  }
}
