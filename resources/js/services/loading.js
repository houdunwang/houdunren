// 统一页面加载动画
import { Loading } from 'element-ui'

export default {
  instance: null,
  show(text = '') {
    this.instance = Loading.service({
      lock: true,
      text: text,
      fullscreen: true,
      background: 'rgba(255, 255, 255, 0.1)'
    })
  },
  close() {
    this.instance.close()
  }
}
