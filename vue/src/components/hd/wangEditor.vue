<script lang="ts" setup>
import { IDomEditor, IEditorConfig, IToolbarConfig } from '@wangeditor/editor'
import { Editor, Toolbar } from '@wangeditor/editor-for-vue'
import '@wangeditor/editor/dist/css/style.css'
import { onBeforeUnmount, ref, shallowRef, watch } from 'vue'
const { uploadImage } = useUpload()
interface IProps {
  modelValue: string
  height: number
}
const props = withDefaults(defineProps<IProps>(), {
  modelValue: '',
  height: 300,
})
const emit = defineEmits(['update:modelValue'])

// 编辑器实例，必须用 shallowRef
const editorRef = shallowRef<IDomEditor>()
// 内容 HTML
const valueHtml = ref(props.modelValue.startsWith('<p>') ? props.modelValue : `<p>${props.modelValue}</p>`)

// 组件销毁时，也及时销毁编辑器
onBeforeUnmount(() => {
  const editor = editorRef.value
  if (editor == null) return
  editor.destroy()
})

const handleCreated = (editor: IDomEditor) => {
  editorRef.value = editor
}

watch([valueHtml], (value: any) => {
  emit('update:modelValue', editorRef.value?.getHtml())
})

// 创建工具栏
const mode = ref('default')
const toolbarConfig: Partial<IToolbarConfig> = {
  excludeKeys: ['group-video', 'undo', 'redo'],
}

const editorConfig: Partial<IEditorConfig> = {
  MENU_CONF: {
    uploadImage: {
      async customUpload(file: File, insertFn: any) {
        const form = new FormData()
        form.append('file', file, file.name)
        const res = await uploadImage(form)
        insertFn(res.data.url, '', res.data.url)
      },
    },
  },
}
</script>

<template>
  <div style="border: 1px solid #ccc">
    <Toolbar style="border-bottom: 1px solid #ccc" :editor="editorRef" :defaultConfig="toolbarConfig" :mode="mode" />
    <Editor
      :style="`height: ${props.height}px; overflow-y: hidden`"
      v-model="valueHtml"
      :defaultConfig="editorConfig"
      :mode="mode"
      @onCreated="handleCreated" />
  </div>
</template>

<style lang="scss" scoped>
.w-e-full-screen-container {
  z-index: 9999;
}
</style>
