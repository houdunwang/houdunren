import Vue from 'vue'
import dayjs from 'dayjs'

Vue.filter('fromNow', function(value) {
    return dayjs(value).fromNow()
})

Vue.filter('format', value => {
    return dayjs(value).format('YYYY-MM-DD hh:mm')
})
