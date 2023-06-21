import { http } from '@/plugins/axios'
import { ElMessage, ElMessageBox } from 'element-plus'

export default () => {
  const softSecret = ref<Partial<SoftSecretModel>>()

  //获取软件密钥
  const getSoftSecret = async () => {
    try {
      softSecret.value = await http.request<SoftSecretModel>({
        url: `softSecret`,
      })
    } catch (error) {}
  }

  //刷新当前用户软件密钥
  const refreshSecret = async () => {
    softSecret.value = await http.request<SoftSecretModel>({
      url: `softSecret/refresh`,
    })
  }

  return { refreshSecret, getSoftSecret, softSecret }
}
