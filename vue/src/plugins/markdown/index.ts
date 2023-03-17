import { App } from 'vue'
import VueMarkdownEditor from '@kangc/v-md-editor'
import '@kangc/v-md-editor/lib/style/base-editor.css'
import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js'
import '@kangc/v-md-editor/lib/theme/style/vuepress.css'

import Prism from 'prismjs'
import VMdPreviewHtml from '@kangc/v-md-editor/lib/preview-html'
import '@kangc/v-md-editor/lib/style/preview-html.css'
// 预览
import hljs from 'highlight.js'
import VMdPreview from '@kangc/v-md-editor/lib/preview'
import '@kangc/v-md-editor/lib/style/preview.css'
import githubTheme from '@kangc/v-md-editor/lib/theme/github.js'
import '@kangc/v-md-editor/lib/theme/style/github.css'
VMdPreview.use(githubTheme, {
  Hljs: hljs,
})

// 引入使用主题的样式
VueMarkdownEditor.use(vuepressTheme, {
  Prism,
})
export default (app: App) => {
  app.use(VueMarkdownEditor)
  app.use(VMdPreviewHtml)
  app.use(VMdPreview)
}
