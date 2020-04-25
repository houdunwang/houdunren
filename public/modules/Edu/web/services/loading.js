// 统一页面加载动画
import store from '@/store'
export default {
  show() {
    store.commit('loading/set', true)
  },
  close() {
    store.commit('loading/set', false)
  }
}
