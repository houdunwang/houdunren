import { http } from '@/plugins/axios'

export default () => {
  const common = async () => {
    return await http.request<any>({
      url: `config/common`,
    })
  }

  const all = async () => {
    return await http.request<any>({
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

  return { update, all, common }
}
