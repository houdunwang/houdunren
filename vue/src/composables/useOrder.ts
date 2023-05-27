import { http } from '@/plugins/axios'

export default () => {
  //创建订单
  const createOrder = async (payType: string, price: number) => {
    return await http.request<OrderModel>({
      url: `/order/create`,
      method: 'POST',
      data: { payType, price },
    })
  }

  return { createOrder }
}
