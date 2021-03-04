import Vue from 'vue'
import dayjs from 'dayjs'

//内容截断
Vue.filter('truncate', function(value, len = 55, ex = true) {
    if (value) {
        return value.length > len ? value.substr(0, len) + (ex ? ' ...' : '') : value
    }
})

//得到几小时之前的时间表示
Vue.filter('fromNow', function(value) {
    return dayjs(value).fromNow()
})

//得到几小时之前的时间表示
Vue.filter('dateFormat', function(value, format = 'YYYY-MM-DD hh:mm') {
    return dayjs(value).format(format)
})
