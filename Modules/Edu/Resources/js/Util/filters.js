import Vue from 'vue'
import moment from 'moment'

Vue.filter('now', function(value) {
    return value && moment(value).fromNow()
})

Vue.filter('format', value => {
    return value && moment(value).format('YYYY-MM-DD hh:mm')
})
