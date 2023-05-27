import { ElMessageBox } from 'element-plus'
import { http } from '@/plugins/axios'

const { user } = useUserStore()

export default () => {
  const collection = ref<SignModel[]>()
  const userCollection = ref<ApiPage<SignModel>>()
  const paginateCollection = ref<ApiPage<SignModel>>()

  //今日签到列表
  const getTodaySignList = async () => {
    collection.value = await http.request<SignModel[]>({
      url: `sign/todaySignList`,
    })
  }

  //用户签到列表
  const getUserSignList = async (uid: any, page: any) => {
    userCollection.value = await http.request<ApiPage<SignModel>>({
      url: `sign/userSignList/${uid}?page=${page}`,
    })
  }

  //用户今日签到数据
  const todaySign = computed(() => {
    return collection.value?.find((sign) => sign.user_id == user?.id)
  })

  //添加签到
  const add = async (data: any) => {
    const sign = await http.request<SignModel>({
      url: 'sign',
      method: 'POST',
      data,
    })
    collection.value?.push(sign)
  }

  //删除签到
  const remove = async (id: number) => {
    await ElMessageBox.confirm('确定删除吗？')
    await http.request<SignModel>({
      url: `sign/${id}`,
      method: 'DELETE',
    })
    collection.value?.splice(
      collection.value.findIndex((v) => v.id == id),
      1,
    )
  }
  return {
    collection,
    getTodaySignList,
    add,
    todaySign,
    remove,
    getUserSignList,
    userCollection,
    paginateCollection,
  }
}
