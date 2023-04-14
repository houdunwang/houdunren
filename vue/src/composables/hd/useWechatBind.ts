import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'

export default () => {
  const storeUser = useUserStore()
  const qr = ref<{ ticket: string }>()

  //使用ticket微信登录
  const bind = async () => {
    await http.request<{ user: UserModel }>({
      url: `wechat/bind/${qr.value?.ticket}`,
      method: 'POST',
    })
    useUserStore().getCurrentUser()
  }

  //解除绑定
  const unbind = async () => {
    ElMessageBox.confirm('确定解除绑定吗？').then(async () => {
      await http.request({
        url: `wechat/unbind`,
        method: 'POST',
      })
      storeUser.getCurrentUser()
    })
  }

  //获取登录二维码
  const getScanQr = async () => {
    qr.value = await http.request<{ ticket: string }>({
      url: `wechat/scanloginQr`,
      method: 'POST',
    })
  }

  return { bind, unbind, getScanQr, qr }
}
