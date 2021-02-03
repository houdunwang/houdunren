import Vue from 'vue'
import dayjs from 'dayjs'

//显示几天前
Vue.filter('fromNow', function(value) {
    return dayjs(value).fromNow()
})

//格式化日期
Vue.filter('format', value => {
    return dayjs(value).format('YYYY-MM-DD hh:mm')
})
