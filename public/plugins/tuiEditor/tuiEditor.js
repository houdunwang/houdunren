class TotalEditor {
  constructor(options) {
    this.options = options
    this.editor = this.init()
    this.fullScreenEvent()
  }

  init() {
    const options = this.options
    return new toastui.Editor({
      el: document.querySelector(this.options.el),
      previewStyle: 'vertical',
      initialValue: this.options.content || '',
      initialEditType: this.options.type || 'wysiwyg',
      height: this.options.height || 300,
      language: 'zh-CN',
      placeholder: '',
      events: {
        //监听编辑器输入
        change: () => {
          if (options.onchange) {
            options.onchange(this.editor.getMarkdown())
          }
        },
      },
      hooks: {
        async addImageBlobHook(blob, callback) {
          let formData = new FormData()
          //添加post数据
          formData.append('file', blob, blob.name)
          //上传图片
          let response = await axios.post(options.action || '/common/upload/make', formData)
          //更改编辑器内容
          callback(response.path, blob.name)
          return false
        },
      },
      toolbarItems: this.toolbar(),
    })
  }

  //添加按钮
  createButton(className) {
    const button = document.createElement('button')
    button.className = className
    button.innerHTML = `<i class="fa fa-arrows-alt" style="color:#666;"></i>`
    return button
  }

  //全屏事件
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
  }

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
  }
}
