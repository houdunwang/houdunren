import { http } from '@/plugins/axios'

export default () => {
  const getSubscribeInfo = async () => {
    return await http.request<SubscribeModel>({
      url: `subscribe/info`,
    })
  }

  const douyinSubscribe = async (data: { mobile: string; trade_no: string }) => {
    http.request({
      url: 'subscribe/douyin',
      method: 'POST',
      data,
    })
  }
  return { getSubscribeInfo, douyinSubscribe }
}
