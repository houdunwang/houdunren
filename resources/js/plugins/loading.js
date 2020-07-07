import { Loading } from 'element-ui'

export default {
  loading: null,
  open() {
    this.loading = Loading.service({
      lock: true,
      text: '加载中...',
    })
  },
  close() {
    this.loading.close()
  },
}
