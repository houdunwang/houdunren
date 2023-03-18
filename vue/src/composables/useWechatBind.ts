import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'

export default () => {
  const storeUser = useUserStore()
  const qr = ref<{ ticket: string }>()

  //使用ticket微信登录
  const bind = async () => {
    const { code } = await http.request<ApiData<{ user: UserModel }>>(
      {
        url: `wechat/bind/${qr.value?.ticket}`,
        method: 'POST',
      },
      { message: false, loading: false },
    )

    if (code == 0) {
      location.reload()
    }
  }

  //解除绑定
  const unbind = async () => {
    ElMessageBox.confirm('确定解除绑定吗？').then(async () => {
      await http.request<ApiData<{ user: UserModel }>>({
        url: `wechat/unbind`,
        method: 'POST',
      })
      storeUser.getCurrentUser()
      location.reload()
    })
  }

  //获取登录二维码
  const getScanQr = async () => {
    const { data } = await http.request<{ data: { ticket: string } }>({
      url: `wechat/scanloginQr`,
      method: 'POST',
    })
    qr.value = data
  }

  return { bind, unbind, getScanQr, qr }
}
