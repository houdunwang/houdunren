// import useAuth from '@/composables/useAuth'
// import useStorage from '@/composables/useStorage'
// import { CacheKey } from '@/enum/CacheKey'
// import { RouteName } from '@/enum/RouteName'
// import useUserStore from '@/store/useUserStore'
// import { ElMessage } from 'element-plus'
import { RouteLocationNormalized, Router } from 'vue-router'
import { useTitle } from '@vueuse/core'

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
    return { name: RouteName.LOGIN }
  }

  if (to.meta.guest && isLogin()) return '/'
  if (to.meta.title) useTitle(to.meta.title)
}

//初始应用
async function init() {
  if (isInit === true) return
  isInit = true
  const userStore = useUserStore()
  await Promise.all([userStore.getCurrentUser()])
}
