//全局过滤器

import Vue from 'vue'
import moment from 'moment'
moment.locale('zh-cn')

Vue.filter('dateFormat', value => {
  if (!value) return ''
  return moment(value).fromNow()
})
