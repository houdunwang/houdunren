import { http } from '@/plugins/axios'

export default () => {
  const get = async () => {
    return await http.request<ConfigModel>({
      url: `config/all`,
    })
  }

  const update = async (data: ConfigModel) => {
    await http.request({
      url: `config`,
      method: 'PUT',
      data,
    })
  }

  return { get, update }
}
