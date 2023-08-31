import { ApiEnum } from '@/enum/ApiEnum'
import { http } from '@/plugins/axios'
const storage = useStorage()

export default () => {
  const userStore = useUserStore()
  const form = reactive({
    account: '',
    password: '',
    password_confirmation: '',
    captcha: '',
    captcha_key: '',
    code: '',
  })
  //超管
  const isAdministrator = () => {
    return useUserStore().user?.id == 1
  }

  //模型权限验证
  function authorize(userId: undefined | number = undefined) {
    return userId && (userId == useUserStore().user?.id || useUserStore().user?.id == 1)
  }

  //登录检测
  function isLogin(): boolean {
    return userStore.isLogin
    // return useStorage().get(CacheKey.TOKEN_NAME)
  }

  //退出登录
  async function logout() {
    await http.request({
      url: `auth/logout`,
      method: 'post',
    })
    // storage.remove(CacheKey.TOKEN_NAME)
    // storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
    location.href = '/'
  }

  //找回密码
  async function findPassword() {
    try {
      await http.request<{ token: string; user: UserModel }>({
        url: ApiEnum.FORGOT_PASSWORD,
        method: 'post',
        data: form,
      })
      //   storage.set(CacheKey.TOKEN_NAME, token)
      const redirectUrl = storage.get(CacheKey.REDIRECT_ROUTE_NAME, '/')
      storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
      location.href = redirectUrl
    } catch (error) {
      useCaptcha().getCaptcha()
    }
  }

  //登录
  const login = useUtil().request(async () => {
    try {
      await http.request<{ token: string; user: UserModel }>({
        url: ApiEnum.LOGIN,
        method: 'POST',
        data: form,
      })
      //   storage.set(CacheKey.TOKEN_NAME, token)
      const redirectUrl = storage.get(CacheKey.REDIRECT_ROUTE_NAME, '/')
      storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
      location.href = redirectUrl
    } catch (error) {
      useCaptcha().getCaptcha()
    }
  })

  const register = useUtil().request(async () => {
    try {
      await http.request<{ token: string; user: UserModel }>({
        url: 'auth/register',
        method: 'POST',
        data: form,
      })
      //   storage.set(CacheKey.TOKEN_NAME, token)
      const redirectUrl = storage.get(CacheKey.REDIRECT_ROUTE_NAME, '/')
      storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
      location.href = redirectUrl
    } catch (error) {
      useCaptcha().getCaptcha()
    }
  })

  return { authorize, isLogin, logout, login, form, findPassword, register, isAdministrator }
}
