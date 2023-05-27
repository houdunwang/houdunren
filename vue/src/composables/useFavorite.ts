import { http } from '@/plugins/axios'

interface IFavorite {
  total: number
  state: boolean
  is_favorite: boolean
}

export default () => {
  const collection = ref<ApiPage<any>>()
  const favorite = ref<IFavorite>()

  const toggleFavorite = async (model: string, id: number) => {
    favorite.value = await http.request<IFavorite>({
      url: `favorite/${model}/${id}`,
      method: 'POST',
    })
  }

  const find = async (model: string, id: any) => {
    favorite.value = await http.request<IFavorite>({
      url: `favorite/${model}/${id}`,
    })
  }

  //用户收藏列表
  const getUserFavorite = async (model: string, uid: any) => {
    collection.value = await http.request<ApiPage<any>>({
      url: `favorite/userFavoriteList/${model}/${uid}`,
    })
  }

  return { favorite, toggleFavorite, find, getUserFavorite, collection }
}
