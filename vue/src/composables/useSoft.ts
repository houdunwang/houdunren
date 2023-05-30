import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { ElMessageBox } from 'element-plus'

export default () => {
  const collection = ref<SoftModel[]>()
  const model = ref<Partial<SoftModel>>({})
  const getAll = async () => {
    collection.value = await http.request<SoftModel[]>({
      url: 'soft',
    })
  }

  const find = async (id: number) => {
    model.value = await http.request<SoftModel>({
      url: `soft/${id}`,
    })
  }

  const store = async () => {
    await http.request<SoftModel>({
      url: `soft`,
      method: 'POST',
      data: model.value,
    })
    router.push({ name: 'admin.soft' })
  }

  const update = async () => {
    await http.request<SoftModel>({
      url: `soft/${model.value.id}`,
      method: 'PUT',
      data: model.value,
    })
    router.push({ name: 'admin.soft' })
  }

  const destroy = async (id: number) => {
    try {
      await ElMessageBox.confirm('确定删除吗')
      await http.request<SoftModel>({
        url: `soft/${id}`,
        method: 'DELETE',
        data: model,
      })
      const index = collection.value?.findIndex((item) => item.id == id)!
      collection.value?.splice(index, 1)
    } catch (error) {}
  }

  return { getAll, collection, destroy, model, find, store, update }
}
