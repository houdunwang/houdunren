import { http } from '@/plugins/axios'
import qs from 'qs'
import router from '@/plugins/router'
import { Ref } from 'vue'
import { ElMessageBox } from 'element-plus'
import { useTitle } from '@vueuse/core'

export default () => {
  const collection = ref<ApiPage<LessonModel>>() as unknown as Ref<ApiPage<LessonModel>>
  const model = ref<LessonModel>() as unknown as Ref<LessonModel>
  const route = useRoute()
  const findAll = async (page: any, params = {}) => {
    collection.value = await http.request<ApiPage<LessonModel>>({
      url: `lesson?page=${page}&` + qs.stringify(params),
    })
  }

  const findOne = async (id: any) => {
    model.value = await http.request<LessonModel>({
      url: `lesson/${id}`,
    })
    const title = useTitle(null)
    title.value = model.value.title
  }

  const add = async (data: any) => {
    await http.request<SystemModel>({
      url: `lesson`,
      method: 'POST',
      data,
    })
    router.push({ name: 'admin.lesson' })
  }

  const update = async (data: any) => {
    await http.request<LessonModel>({
      url: `lesson/${data.id}`,
      method: 'PUT',
      data,
    })

    router.push({ name: 'admin.lesson' })
  }

  const remove = async (id: any) => {
    try {
      await ElMessageBox.confirm('确定删除吗?', '温馨提示')
      await http.request({
        url: `lesson/${id}`,
        method: 'DELETE',
      })
      if (route.fullPath.includes('admin')) {
        location.reload()
      } else {
        router.push({ name: 'lesson' })
      }
    } catch (error) {}
  }

  const getDownloadUrl = async (id: number) => {
    return http.request<string>({
      url: `lesson/downloadUrl/${id}`,
    })
  }

  return { findAll, collection, findOne, model, update, remove, add, getDownloadUrl }
}
