import { Loading } from 'element-ui'

export default {
  loading: null,
  open() {
    this.loading = Loading.service({
      lock: true,
      text: '加载中...',
      background: 'rgba(255,255,255,0.2)',
    })
  },
  close() {
    this.loading.close()
  },
}
