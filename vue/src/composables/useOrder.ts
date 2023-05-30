import { http } from '@/plugins/axios'
import router from '@/plugins/router'
import { ElMessage } from 'element-plus'

export default () => {
  const { isLogin } = useAuth()
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
