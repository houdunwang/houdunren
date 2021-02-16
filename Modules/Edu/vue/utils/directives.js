import Vue from 'vue'
import MarkdownIt from 'markdown-it'
import hljs from 'highlight.js'
// import 'highlight.js/styles/routeros.css'
import 'highlight.js/styles/dracula.css'
import javascript from 'highlight.js/lib/languages/javascript'

//格式化markdown内容
Vue.directive('markdown', {
    inserted: function(el) {
        const md = new MarkdownIt()
        el.innerHTML = md.render(el.innerHTML)
        // setTimeout(() => {
        hljs.registerLanguage('javascript', javascript)
        el.querySelectorAll('pre code').forEach(block => {
            hljs.highlightBlock(block)
        })
    }
})
