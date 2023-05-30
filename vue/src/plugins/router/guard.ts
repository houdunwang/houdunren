import config from '@/config'
import { useTitle } from '@vueuse/core'
import { ElMessage } from 'element-plus'
import { RouteLocationNormalized, Router } from 'vue-router'

let isInit = false
export default (router: Router) => {
  router.beforeEach(beforeEach)
}

//路由守卫
async function beforeEach(to: RouteLocationNormalized, from: RouteLocationNormalized) {
  await init()
  const { isLogin } = useAuth()
  const { isAdministrator } = useUser()
  const storage = useStorage()

  if (to.meta.auth && !isLogin()) {
    storage.set(CacheKey.REDIRECT_ROUTE_NAME, to.fullPath)
    ElMessage.success('请登录后操作')
    return { name: 'login' }
  }
  if (to.meta.admin && !isAdministrator()) {
    ElMessage({ type: 'error', grouping: true, message: '没有访问权限' })
    return from
  }
  if (to.meta.guest && isLogin()) return '/'
  if (to.meta.title) useTitle(to.meta.title)
}

//初始应用
async function init() {
  if (isInit === true) return
  isInit = true
  await Promise.all(config.middleware.map((middleware: any) => middleware()))
}
