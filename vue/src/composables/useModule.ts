import { http } from '@/plugins/axios'
import { ElMessageBox } from 'element-plus'

export default () => {
  const collections = ref<ModuleModel[]>()

  const getAll = async () => {
    collections.value = await http.request({
      url: `module`,
    })
  }

  const install = async (name: string) => {
    http.request({
      url: `module/install/${name}`,
    })
    location.reload()
  }

  const unInstall = async (name: string) => {
    await ElMessageBox.confirm('确定卸载吗？卸载将删除模块的所有表数据，请先做好备份')

    http.request({
      url: `module/unInstall/${name}`,
      method: 'DELETE',
    })
    location.reload()
  }
  return { getAll, collections, install, unInstall }
}
