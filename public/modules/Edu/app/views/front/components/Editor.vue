<template>
  <div id="editor"></div>
</template>

<script>
import 'codemirror/lib/codemirror.css' // Editor's Dependency Style
import '@toast-ui/editor/dist/toastui-editor.css' // Editor's Style
import Editor from '@toast-ui/editor'
export default {
  props: {
    action: { type: String },
    //通知父组件事件
    contentChange: { type: Function },
    height: {
      type: String,
      default: '300px'
    },
    previewStyle: {
      type: String,
      default: 'vertical'
    },
    initialEditType: {
      type: String,
      default: 'markdown'
    },
    initialValue: { type: String, default: '' }
  },
  data() {
    return {
      editor: null
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
        el: document.querySelector('#editor'),
        previewStyle: this.previewStyle,
        initialEditType: this.initialEditType,
        height: this.height,
        initialValue: this.initialValue,
        language: 'zh',
        plugins: [Editor.codeSyntaxHighlight],
        placeholder: '支持托放与粘贴上传图片',
        events: {
          //监听编辑器输入
          change: function() {
            Vue.$emit('contentChange', editor.getHtml())
          }
        },
        hooks: {
          async addImageBlobHook(blob, callback) {
            let formData = new FormData()
            //添加post数据
            formData.append('file', blob, blob.name)
            //上传图片
            let response = await window.axios.post(`common/upload`, formData)
            //更改编辑器内容
            callback(response.data.path, blob.name)
            return false
          }
        },
        toolbarItems: this.toolbar()
      })
      this.editor = editor
    },
    /**
     * 添加工具条按钮
     */
    createButton(className) {
      const button = document.createElement('button')
      button.className = className
      button.innerHTML = `<i class="fa fa-arrows-alt" style="color:#666;"></i>`
      return button
    },
    /**
     * 添加全屏按钮事件
     */
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
    /**
     * 自定义工具条
     */
    toolbar() {
      return [
        {
          type: 'button',
          options: {
            el: this.createButton('last'),
            name: 'fullscreen',
            tooltip: 'fullscreen',
            event: 'fullscreen'
          }
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
        'divider'
      ]
    }
  }
}
</script>
<style>
.fullScreen {
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: #fff;
}
</style>
