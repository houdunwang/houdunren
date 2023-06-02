import { http } from '@/plugins/axios'

export default () => {
  //创建订单
  const createOrder = async (payType: string, packageItem: PackageModel) => {
    return await http.request<OrderModel>({
      url: `/order/create/${packageItem.id}`,
      method: 'POST',
      data: { payType },
    })
  }

  return { createOrder }
}
