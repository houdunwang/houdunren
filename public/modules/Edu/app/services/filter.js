//全局过滤器
import Vue from 'vue'
import moment from 'moment'
moment.locale('zh-cn')

Vue.filter('dateFormat', (value, type = 'nowa') => {
  if (!value) return ''
  switch (type) {
    case 'now':
      //前几天形式
      return moment(value).fromNow()
    case 'time':
      return moment(value).format('HH:mm')
    default:
      return moment(value).format('Y-M-D')
  }
})
