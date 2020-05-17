import Vue from 'vue'
import marked from 'marked'
Vue.filter('markdownToHtml', value => {
  return marked(value)
})
