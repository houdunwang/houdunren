import Vue from 'vue'

let files = require.context('../components', true, /\.vue$/i)

files.keys().map((key) => {
  Vue.component(key.split('/').pop().split('.')[0], files(key).default)
})

files = require.context('../../../../../resources/js/components/common', true, /\.vue$/i)

files.keys().map((key) => {
  Vue.component(key.split('/').pop().split('.')[0], files(key).default)
})
