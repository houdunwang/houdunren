import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'
import qs from 'qs'
import { Ref } from 'vue'
import router from '@/plugins/router'
const { open } = useUtil()

export default () => {
  const collection = ref<ApiPage<TopicModel>>() as unknown as Ref<ApiPage<TopicModel>>
  const model = ref<Partial<TopicModel>>({ title: '', content: '', filename: '' })

  const findAll = async (page: any, params = {}) => {
    collection.value = await http.request<ApiPage<TopicModel>>({
      url: `topic?page=${page}&` + qs.stringify(params),
    })
  }

  //推荐贴子列表
  const getRecommendList = async () => {
    return await http.request<TopicModel[]>({
      url: `topic/recommend`,
    })
  }

  //用户贴子列表
  const userToipcList = async (userId: any, page: any = 1) => {
    collection.value = await http.request<ApiPage<TopicModel>>({
      url: `topic/user/${userId}?page=${page}`,
    })
  }

  const findOne = async (id: number) => {
    model.value = await http.request<TopicModel>({
      url: `topic/${id}`,
    })
  }

  const add = async (data: any) => {
    const topic = await http.request<TopicModel>({
      url: `topic`,
      method: 'POST',
      data,
    })

    open({ name: 'topic.show', params: { id: topic.id } })
  }

  const update = async (data: any) => {
    await http.request<TopicModel>({
      url: `topic/${data.id}`,
      method: 'PUT',
      data,
    })
    open({ name: 'topic.show', params: { id: data.id } })
  }

  const remove = async (id: number) => {
    await ElMessageBox({ message: '确定删除吗？' })
    await http.request<null>({
      url: `topic/${id}`,
      method: 'DELETE',
    })
    router.push({ name: 'topic' })
  }

  //贴子推荐属性切换
  const toggleRecommend = async (id: number) => {
    model.value = await http.request<TopicModel>({
      url: `topic/recommend/${id}`,
      method: 'PUT',
    })
  }

  return { findAll, collection, findOne, model, add, update, remove, userToipcList, toggleRecommend, getRecommendList }
}
