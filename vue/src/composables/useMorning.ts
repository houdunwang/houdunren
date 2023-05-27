import { http } from '@/plugins/axios'
import { ElMessageBox } from 'element-plus'
import { Ref } from 'vue'
import qs from 'qs'
import router from '@/plugins/router'

export default () => {
  const collection = ref<ApiPage<MorningModel>>() as unknown as Ref<ApiPage<MorningModel>>
  const model = ref<MorningModel>() as unknown as Ref<MorningModel>
  //满足活动的签到用户
  const signUsers = ref<ApiPage<UserModel>>()

  const findAll = async (page: any, params: any = {}) => {
    collection.value = await http.request<ApiPage<MorningModel>>({
      url: `morning?page=${page}&` + qs.stringify(params),
    })
  }

  //15天内签到的用户列表
  const getSignUsers = async (page: any) => {
    signUsers.value = await http.request<ApiPage<UserModel>>({
      url: `morning/signs?page=${page}`,
    })
  }

  //获取最近的活动
  const getLatest = async () => {
    model.value = await http.request<MorningModel>({
      url: `morning/latest`,
    })
  }

  const findOne = async (id: any) => {
    model.value = await http.request<MorningModel>({
      url: `morning/${id}`,
    })
  }

  const add = async (data: any) => {
    model.value = await http.request<MorningModel>({
      url: `morning`,
      method: 'POST',
      data,
    })
    router.push({ name: 'morning.admin' })
  }

  const update = async (data: any) => {
    model.value = await http.request<MorningModel>({
      url: `morning/${data.id}`,
      method: 'PUT',
      data,
    })
    router.push({ name: 'morning.admin' })
  }

  const remove = async (id: number) => {
    await ElMessageBox({ message: '确定删除吗?' })
    await http.request({
      url: `morning/${id}`,
      method: 'DELETE',
    })

    const index = collection.value.data.findIndex((v) => v.id == id)
    collection.value.data.splice(index, 1)
  }

  const luck = async () => {
    return await http.request<UserModel>({
      url: `morning/luck`,
      method: 'POST',
    })
  }

  return { findAll, collection, getLatest, model, update, remove, add, findOne, luck, getSignUsers, signUsers }
}
