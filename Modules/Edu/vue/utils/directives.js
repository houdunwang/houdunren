import Vue from 'vue'
import hljs from 'highlight.js'
import 'highlight.js/styles/dracula.css'
import javascript from 'highlight.js/lib/languages/javascript'

//格式化markdown内容
Vue.directive('markdown', {
    inserted: function(el) {
        hljs.registerLanguage('javascript', javascript)
        el.querySelectorAll('pre code').forEach(block => {
            hljs.highlightBlock(block)
        })
    }
})
