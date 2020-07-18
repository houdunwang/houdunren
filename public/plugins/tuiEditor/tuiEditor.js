const tuiEditorTool = {
  //编辑器实例
  editor: null,
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
      console.log(ui)

      if (cm.getOption('fullScreen')) {
        ui.classList.add('tuiEditor-fullScreen')
      } else {
        ui.classList.remove('tuiEditor-fullScreen')
      }
    })
  },
  //添加工具条按钮
  createButton(className) {
    const button = document.createElement('button')
    button.className = className
    button.innerHTML = `<i class="fa fa-arrows-alt" style="color:#666;"></i>`
    return button
  },
  //自定义工具条
  toolbar() {
    return [
      //添加全屏按钮
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
}

window.hdEditor = function (el, options = {}) {
  const config = Object.assign(
    {
      el: document.querySelector(el),
      //图片上传地址
      action: '',
      height: '450px',
      initialEditType: 'wysiwyg',
      previewStyle: 'vertical',
      hooks: {
        async addImageBlobHook(blob, callback) {
          let formData = new FormData()
          //添加post数据
          formData.append('file', blob, blob.name)
          //上传图片
          let response = await axios.post(config.action, formData)
          //更改编辑器内容
          callback(response.path, blob.name)
          return false
        },
      },
      toolbarItems: tuiEditorTool.toolbar(),
    },
    options
  )

  const editor = new toastui.Editor(config)
  tuiEditorTool.editor = editor
  tuiEditorTool.fullScreenEvent()
  return editor
}
