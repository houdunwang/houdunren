import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { ElMessageBox } from 'element-plus'

export default () => {
  const collections = ref<ModuleModel[]>()
  const model = ref<ModuleModel>({
    name: '',
    domain: '',
  })

  const getAll = async () => {
    collections.value = await http.request({
      url: `module`,
    })
  }

  const find = async (id: any) => {
    model.value = await http.request({
      url: `module/${id}`,
    })
  }

  const install = async (name: string) => {
    await http.request({
      url: `module/install/${name}`,
    })
    location.reload()
  }

  const unInstall = async (name: string) => {
    await ElMessageBox.confirm('确定卸载吗？卸载将删除模块的所有表数据，请先做好备份')

    await http.request({
      url: `module/unInstall/${name}`,
      method: 'DELETE',
    })
    location.reload()
  }

  const update = async () => {
    await http.request({
      url: `module/${model.value!.id}`,
      method: 'PUT',
      data: model.value,
    })
    location.href = router.resolve({ name: 'admin' }).fullPath
  }

  const store = async () => {
    await http.request({
      url: `module`,
      method: 'POST',
      data: model.value,
    })
  }
  return { getAll, collections, install, unInstall, update, find, model, store }
}
