//全局过滤器
import Vue from 'vue'
import moment from 'moment'
moment.locale('zh-cn')

Vue.filter('dateFormat', (value, type = 'Y-M-D') => {
  if (!value) return ''
  switch (type) {
    case 'now':
      //前几天形式
      return moment(value).fromNow()
    default:
      return moment(value).format(type)
  }
})
