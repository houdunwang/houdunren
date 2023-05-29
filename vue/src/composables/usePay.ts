import { http } from '@/plugins/axios'
import { ElMessage } from 'element-plus'
const { createOrder } = useOrder()
export default () => {
  const wepayQr = ref('')

  //PC 支付宝支付
  const alipay = async (price: number) => {
    const order = await createOrder('alipay', price)
    window.open(`/api/alipay/pay/${order.id}`)
  }

  //微信 PC 支付
  const wechatNativePay = async (price: number) => {
    const order = await createOrder('wepay', price)
    wepayQr.value = await http.request<string>({
      url: `wepay/pay/${order.id}`,
      method: 'POST',
    })
  }

  //公众号支付
  const wx = (window as any).wx as any
  const wechatMpPay = async (price: number) => {
    const order = await createOrder('wechatApp', price)

    const res = await http.request<any>({
      url: `wepay/app/${order.id}`,
      method: 'POST',
    })
    wx.config({
      appId: res.appId, // 必填，公众号的唯一标识
      timestamp: res.timeStamp, // 必填，生成签名的时间戳
      nonceStr: res.nonceStr, // 必填，生成签名的随机串
      signature: res.paySign, // 必填，签名
      jsApiList: ['chooseWXPay'], // 必填，需要使用的 JS 接口列表
    })

    wx.chooseWXPay({
      timestamp: res.timeStamp, // 支付签名时间戳，注意微信 jssdk 中的所有使用 timestamp 字段均为小写。但最新版的支付后台生成签名使用的 timeStamp 字段名需大写其中的 S 字符
      nonceStr: res.nonceStr, // 支付签名随机串，不长于 32 位
      package: res.package, // 统一支付接口返回的 prepay_id 参数值，提交格式如：prepay_id=\*\*\*）
      signType: 'RSA', // 微信支付V3的传入 RSA ,微信支付V2的传入格式与V2统一下单的签名格式保持一致
      paySign: res.paySign, // 支付签名
      success: function (res: any) {
        ElMessage.success('订阅成功，开始学习吧')
        location.href = '/'
      },
    })
  }

  return { createOrder, wechatNativePay, wepayQr, wechatMpPay, alipay }
}
