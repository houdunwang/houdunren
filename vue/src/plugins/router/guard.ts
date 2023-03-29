import { RouteLocationNormalized, Router } from 'vue-router'
import { useTitle } from '@vueuse/core'
import config from '@/config'
import { ElMessage } from 'element-plus'
let isInit = false
export default (router: Router) => {
  router.beforeEach(beforeEach)
}

//路由守卫
async function beforeEach(to: RouteLocationNormalized, from: RouteLocationNormalized) {
  await init()
  const { isLogin } = useAuth()
  const storage = useStorage()

  if (to.meta.auth && !isLogin()) {
    storage.set(CacheKey.REDIRECT_ROUTE_NAME, to.fullPath)
    ElMessage.success('请登录后操作')
    location.href = '/auth/login'
  }

  if (to.meta.guest && isLogin()) return '/'
  if (to.meta.title) useTitle(to.meta.title)
}

//初始应用
async function init() {
  if (isInit === true) return
  isInit = true
  await Promise.all(config.middleware.map((middleware) => middleware()))
}
