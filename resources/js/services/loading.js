// 统一页面加载动画
// import { Loading } from 'element-ui'

import store from '@/store'
export default {
  instance: null,
  show(text = '') {
    store.commit('loading/show')
    // this.instance = Loading.service({
    //   lock: true,
    //   text: text,
    //   fullscreen: true,
    //   background: 'rgba(255, 255, 255, 0.1)'
    // })
  },
  close() {
    store.commit('loading/hide')
    // this.instance.close()
  }
}
