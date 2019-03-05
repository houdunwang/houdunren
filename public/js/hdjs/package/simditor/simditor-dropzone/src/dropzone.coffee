class Dropzone extends SimpleModule

  @pluginName: "Dropzone"

  _entered: 0

  _init: ->
    @editor = @_module
    if not @editor.uploader?
      throw new Error "Can't work without 'simple-uploader' module" 
      return

    $(document.body).on "dragover", (e) ->
      e.originalEvent.dataTransfer.dropEffect = "none"
      e.preventDefault()
    $(document.body).on 'drop', (e) ->
      e.preventDefault()

    @imageBtn = @editor.toolbar.findButton "image"
    
    @editor.body.on "dragover", (e) ->
      e.originalEvent.dataTransfer.dropEffect = "copy"
      e.stopPropagation()
      e.preventDefault()
    .on "dragenter", (e) =>
      @show() if (@_entered += 1) == 1
      e.preventDefault()
      e.stopPropagation()
    .on "dragleave", (e) =>
      @hide() if (@_entered -= 1) <= 0
      e.preventDefault()
      e.stopPropagation()
    .on "drop", (e) =>
      imageFiles = []
      for file in e.originalEvent.dataTransfer.files
        if not @validFile file
          alert "「#{file.name}]」文件不是图片。"
          @hide()
          return false
        imageFiles.push file
      for file in imageFiles
        @editor.uploader.upload file, inline: true
      @hide()
      e.stopPropagation()
      e.preventDefault()

  show: ->
    @imageBtn.setActive true

  hide: ->
    @imageBtn.setActive false
    @_entered = 0

  validFile: (file) ->
    file.type.indexOf("image/") > -1
    
Simditor.connect Dropzone
