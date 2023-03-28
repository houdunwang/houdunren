import { ApiEnum } from '@/enum/ApiEnum'
import { http } from '@/plugins/axios'
import router from '@/plugins/router'
const storage = useStorage()

export default () => {
  const form = reactive({
    account: '',
    password: '',
    password_confirmation: '',
    captcha: '',
    captcha_key: '',
    code: '',
  })

  //模型权限验证
  function authorize(userId: undefined | number) {
    return userId == useUserStore().user?.id
  }

  //登录检测
  function isLogin(): boolean {
    return useStorage().get(CacheKey.TOKEN_NAME)
  }

  //退出登录
  async function logout() {
    storage.remove(CacheKey.TOKEN_NAME)
    storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
    location.href = '/'
  }

  //找回密码
  async function findPassword() {
    try {
      const { token } = await http.request<{ token: string; user: UserModel }>({
        url: ApiEnum.FORGOT_PASSWORD,
        method: 'post',
        data: form,
      })
      storage.set(CacheKey.TOKEN_NAME, token)
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
      const { token } = await http.request<{ token: string; user: UserModel }>({
        url: ApiEnum.LOGIN,
        method: 'POST',
        data: form,
      })
      storage.set(CacheKey.TOKEN_NAME, token)
      const redirectUrl = storage.get(CacheKey.REDIRECT_ROUTE_NAME, '/')
      storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
      location.href = redirectUrl
    } catch (error) {
      useCaptcha().getCaptcha()
    }
  })

  return { authorize, isLogin, logout, login, form, findPassword }
}
