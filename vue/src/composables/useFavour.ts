import { http } from '@/plugins/axios'

interface IFavour {
  total: number
  state: boolean
  users: UserModel[]
}

export default () => {
  const favour = ref<IFavour>()

  //切换点赞
  const toggleFavour = async (model: string, id: any) => {
    favour.value = await http.request<IFavour>({
      url: `favour/${model}/${id}`,
      method: 'POST',
    })
  }

  //模型点赞信息
  const getFavourInfo = async (model: string, id: any) => {
    favour.value = await http.request<IFavour>({
      url: `favour/${model}/${id}`,
    })
  }

  return { favour, toggleFavour, getFavourInfo }
}
