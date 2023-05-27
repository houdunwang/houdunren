import { http } from '@/plugins/axios'

export default () => {
  const createMenu = async () => {
    await http.request({
      url: `wechat/menu`,
      method: 'POST',
    })
  }

  return { createMenu }
}
