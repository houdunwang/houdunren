<template>
  <div>
    <div :id="name"></div>
    <div class="text-secondary mt-2 p-2 d-block mb-2"><i class="fas fa-info-circle"></i> 你可以在编辑器底部切换为markdown模式，编辑器也支持托放上传图片。</div>
  </div>
</template>

<script>
import 'codemirror/lib/codemirror.css'
import '@toast-ui/editor/dist/toastui-editor.css'
import '@toast-ui/editor/dist/i18n/zh-cn'
import Editor from '@toast-ui/editor'

export default {
  props: {
    name: { required: true, type: String },
    content: { default: '' },
    //后台上传地址
    action: { required: true, type: String },
    //编辑器高度
    height: { type: String, default: '300px' },
    //显示方式
    previewStyle: { type: String, default: 'vertical' },
    initialEditType: { type: String, default: 'wysiwyg' },
  },
  data() {
    return {
      editor: null,
      //   form: { markdown: '', html: '' },
    }
  },
  mounted() {
    this.initEditor()
    this.fullScreenEvent()
  },
  methods: {
    initEditor() {
      const Vue = this
      const editor = new Editor({
        el: document.querySelector('#' + this.name),
        previewStyle: this.previewStyle,
        initialValue: this.content,
        initialEditType: this.initialEditType,
        height: this.height,
        language: 'zh-CN',
        placeholder: '',
        events: {
          //监听编辑器输入
          change: function () {
            // console.log(editor)
            // console.log(editor.isMarkdownMode()?editor.getMarkdown():editror)
            // console.log(editor.getMarkdown())
            Vue.$emit('update:content', editor.getMarkdown())
          },
        },
        hooks: {
          async addImageBlobHook(blob, callback) {
            let formData = new FormData()
            //添加post数据
            formData.append('file', blob, blob.name)
            //上传图片
            let response = await Vue.axios.post(Vue.action, formData)
            //更改编辑器内容
            callback(response.path, blob.name)
            return false
          },
        },
        toolbarItems: this.toolbar(),
      })
      this.editor = editor
    },
    //添加工具条按钮
    createButton(className) {
      const button = document.createElement('button')
      button.className = className
      button.innerHTML = `<i class="fa fa-arrows-alt" style="color:#666;"></i>`
      return button
    },
    //添加全屏按钮事件
    fullScreenEvent() {
      const toolbar = this.editor.getUI().getToolbar()
      const cm = this.editor.mdEditor.cm
      //设置按钮点击事件
      this.editor.eventManager.addEventType('fullscreen')
      this.editor.eventManager.listen('fullscreen', () => {
        this.editor.previewStyle = 'vertical'
        //保存点击状态
        cm.setOption('fullScreen', !cm.getOption('fullScreen'))
        let ui = document.querySelector('.tui-editor-defaultUI')
        if (cm.getOption('fullScreen')) {
          ui.classList.add('fullScreen')
        } else {
          ui.classList.remove('fullScreen')
        }
      })
    },
    //自定义工具条
    toolbar() {
      return [
        {
          type: 'button',
          options: {
            el: this.createButton('last'),
            name: 'fullscreen',
            tooltip: 'fullscreen',
            event: 'fullscreen',
          },
        },
        'codeblock',
        'divider',
        'heading',
        'bold',
        'italic',
        'strike',
        'divider',
        'hr',
        'quote',
        'divider',
        'ul',
        'ol',
        'task',
        'indent',
        'outdent',
        'divider',
        'table',
        'image',
        'link',
        'divider',
      ]
    },
  },
}
</script>
<style lang="scss">
// 事件按钮需要使用类所以不能加scoped
.fullScreen {
  position: fixed !important;
  z-index: 999;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
}
.tui-editor-defaultUI {
  border: none;
}
</style>
