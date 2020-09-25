<template>
  <div id="editor"></div>
</template>
<script>
// import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import wangEditor from 'wangEditor'
export default {
  data() {
    return {
      editor: null,
      options: {
        modules: {
          toolbar: [[{ header: [1, 2, 3, false] }], ['bold', 'italic', 'underline'], [{ list: 'ordered' }, { list: 'bullet' }], [{ align: [] }], [{ font: [] }], [{ color: [] }, { background: [] }], ['image', 'video']],
        },
        placeholder: 'Compose an epic...',
        theme: 'snow',
      },
    }
  },
  mounted() {
    // const container = document.getElementById('editor')
    // this.editor = new Quill('#editor', this.options)
    var E = wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('editor') )
    editor.create()
  },
}
</script>
<style lang="scss"></style>
