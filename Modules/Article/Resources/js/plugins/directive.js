import Vue from 'vue'
Vue.directive('highlight', {
  inserted: (el) => {
    el.querySelectorAll('pre code').forEach((block) => {
      hljs.highlightBlock(block)
    })
  },
})
