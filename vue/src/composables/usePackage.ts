import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { ElMessageBox } from 'element-plus'

export default () => {
  const collection = ref<PackageModel[]>([])
  const model = ref<Partial<PackageModel>>({})

  const getAll = async () => {
    collection.value = await http.request({
      url: `package`,
    })
  }

  const find = async (id: number) => {
    model.value = await http.request({
      url: `package/${id}`,
    })
  }

  const store = async () => {
    model.value = await http.request({
      url: `package`,
      method: 'POST',
      data: model.value,
    })
    router.push({ name: 'package.admin' })
  }

  const update = async () => {
    model.value = await http.request({
      url: `package/${model.value.id}`,
      method: 'PUT',
      data: model.value,
    })
    router.push({ name: 'package.admin' })
  }

  const destroy = async (id: number) => {
    await ElMessageBox.confirm('确定删除吗？')
    await http.request({
      url: `package/${id}`,
      method: 'DELETE',
    })
    const index = collection.value.findIndex((item) => item.id == id)
    collection.value.splice(index, 1)
  }

  return { getAll, store, update, destroy, collection, model, find }
}
