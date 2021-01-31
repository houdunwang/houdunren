import Vue from 'vue'
import dayjs from 'dayjs'

Vue.filter('now', function(value) {
    return value && dayjs(value).fromNow()
})

Vue.filter('format', value => {
    return value && dayjs(value).format('YYYY-MM-DD hh:mm')
})
