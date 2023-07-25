import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { useTitle } from '@vueuse/core'
import { ElMessageBox } from 'element-plus'
import qs from 'qs'
import { Ref } from 'vue'
export default () => {
  const collection = ref<SystemModel[]>() as unknown as Ref<SystemModel[]>
  const model = ref<SystemModel>({ title: '', description: '', preview: '', download_address: '', type: 'system' })
  const route = useRoute()
  const findAll = async (page = 1, params = {}) => {
    collection.value = await http.request<SystemModel[]>({
      url: `system?page=${page}&` + qs.stringify(params),
    })
  }

  const findOne = async (id: any) => {
    model.value = await http.request<SystemModel>({
      url: `system/${id}`,
    })
    const title = useTitle(null)
    title.value = model.value.title
  }

  //获取课程详细资料，包括下载地址
  const getSystemInfo = async (id: any) => {
    model.value = await http.request<SystemModel>({
      url: `system/info/${id}`,
    })
    const title = useTitle(null)
    title.value = model.value.title
  }

  const add = async () => {
    await http.request<SystemModel>({
      url: `system`,
      method: 'POST',
      data: model.value,
    })
  }

  const update = async () => {
    await http.request<SystemModel>({
      url: `system/${model.value?.id}`,
      method: 'PUT',
      data: model.value,
    })
    router.push({ name: 'admin.system' })
  }

  const remove = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗?', '温馨提示')
      await http.request({
        url: `system/${id}`,
        method: 'DELETE',
      })
      const index = collection.value.findIndex((item) => item.id == id)
      collection.value.splice(index, 1)
    } catch (error) {}
  }

  const order = async (data: SystemModel[]) => {
    await http.request({
      url: `system/order`,
      method: 'PUT',
      data,
    })
  }

  const getDownloadUrl = async (id: number) => {
    return http.request<string>({
      url: `system/downloadUrl/${id}`,
    })
  }

  return { findAll, collection, findOne, model, update, order, add, remove, getDownloadUrl, getSystemInfo }
}
