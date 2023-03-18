import { http } from '@/plugins/axios'

export default () => {
  const config = ref<ConfigModel>()

  const get = async () => {
    config.value = await http.request<ConfigModel>({
      url: `config/all`,
    })
  }

  //用户收藏列表
  const update = async () => {
    await http.request<ApiPage<any>>({
      url: `config`,
      method: 'PUT',
      data: config.value,
    })
  }

  return { get, update, config }
}
