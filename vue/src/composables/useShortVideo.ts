import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { ElMessageBox } from 'element-plus'
const { open } = useUtil()

export default () => {
  const collection = ref<ApiPage<ShortVideoModel>>()
  const model = ref<ShortVideoModel>()

  const findAll = async (page: any = 1, row = 12) => {
    collection.value = await http.request<ApiPage<ShortVideoModel>>({
      url: `shortVideo?page=${page}&row=${row}`,
    })
  }

  const find = async (id: any) => {
    model.value = await http.request<ShortVideoModel>({
      url: `shortVideo/${id}`,
    })
  }

  const add = async (data: any) => {
    await http.request({
      url: `shortVideo`,
      method: 'POST',
      data,
    })
    open({ name: 'admin.shortvideo' })
  }

  const update = async (data: any) => {
    await http.request({
      url: `shortVideo/${data.id}`,
      method: 'PUT',
      data,
    })
    router.push({ name: 'admin.shortvideo' })
  }

  const del = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗？', '温馨提示')
      await http.request({
        url: `shortVideo/${id}`,
        method: 'DELETE',
      })
      location.reload()
    } catch (error) {}
  }
  return {
    model,
    find,
    findAll,
    collection,
    del,
    add,
    update,
  }
}
