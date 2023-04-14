import { CacheKey } from '@/enum/CacheKey'
import { http } from '@/plugins/axios'
const storage = useStorage()

export default () => {
  const qr = ref()

  //微信登录或注册
  const scanLogin = async () => {
    if (!qr.value?.ticket) return
    const { token } = await http.request<{ token?: string }>(
      {
        url: `wechat/sancLogin/${qr.value.ticket}`,
        method: 'POST',
      },
      { loading: false },
    )
    if (token) {
      storage.set(CacheKey.TOKEN_NAME, token)
      const url = storage.get(CacheKey.REDIRECT_ROUTE_NAME, '/')
      storage.remove(CacheKey.REDIRECT_ROUTE_NAME)
      location.href = url
    }
  }

  //获取登录二维码ticket资料
  const scanLoginQr = async () => {
    qr.value = await http.request<{ ticket: string }>({
      url: `wechat/scanloginQr`,
      method: 'POST',
    })
  }

  return { scanLogin, scanLoginQr, qr }
}
