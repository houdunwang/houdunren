import { http } from '@/plugins/axios'
import { ElMessage, ElMessageBox } from 'element-plus'

export default () => {
  //刷新当前用户软件密钥
  const refreshSecret = async () => {
    await ElMessageBox.confirm('确定刷新吗？')
    await http.request<UserModel>({
      url: `softSecret/refresh`,
      method: 'POST',
    })
    useUserStore().getCurrentUser()
  }

  return { refreshSecret }
}
