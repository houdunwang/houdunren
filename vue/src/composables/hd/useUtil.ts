import router from '@/plugins/router'
import { ElMessageBox } from 'element-plus'
import { onBeforeRouteLeave, RouteLocationRaw } from 'vue-router'

export default () => {
  /**
   * 限制点击频率
   * @param fn
   * @returns
   */
  function request(fn: (args?: any) => Promise<any>) {
    let isSend = false
    return (args?: any) => {
      if (isSend) return
      isSend = true
      return fn(args).finally(() => (isSend = false))
    }
  }

  /**
   * 页面访问
   * @param route 路由或URL
   * @param target 跳转方式 _self当前页 _blank 新窗口
   */
  function open(url: RouteLocationRaw | string, target = '_self') {
    if (typeof url != 'string') url = router.resolve(url).fullPath
    if (target == '_blank') window.open(url)
    else location.href = url
  }

  /**
   * 是否为微信客户端判断
   * @returns
   */
  function isWechat() {
    var ua = navigator.userAgent.toLowerCase()
    return ua.match(/MicroMessenger/i)
  }

  /**
   * 获取路由GET参数值
   * @param name 参数名
   * @param defaultValue 当没有参数时的默认值
   * @returns
   */
  const routeQuery = (name: string, defaultValue?: any) => {
    return useRoute().query[name] || defaultValue
  }

  /**
   * 获取路由 Params 参数
   * @param name 参数名
   * @param defaultValue 当没有参数时的默认值
   * @returns
   */
  const routeParams = (name: string, defaultValue?: any) => {
    return useRoute().params[name] || defaultValue
  }

  /**
   * 离开页面确认
   * @param message 消息提示
   */
  const routeLeaveConfirm = async (message = '确定离开吗？') => {
    onBeforeRouteLeave(async () => {
      try {
        await ElMessageBox.confirm(message, '温馨提示')
        return true
      } catch {
        return false
      }
    })
  }

  //public目录图片加载
  const publicImage = (url: string) => {
    return new URL(url, import.meta.url).href
  }
  return {
    routeQuery,
    open,
    request,
    isWechat,
    routeParams,
    routeLeaveConfirm,
    publicImage,
  }
}
