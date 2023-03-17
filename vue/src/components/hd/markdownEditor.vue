<script setup lang="ts">
import VueMarkdownEditor from '@kangc/v-md-editor'
const { uploadImage } = useUpload()
const { modelValue, height = 400 } = defineProps<{
  modelValue: any
  height?: number
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: any): void
}>()
const text = ref(modelValue)

watch(text, (value) => {
  emit('update:modelValue', value)
})

watch(
  () => modelValue,
  (n) => {
    text.value = n
  },
)

const handleUploadImage = async (event: any, insertImage: any, files: any) => {
  const form = new FormData()
  form.append('file', files[0])
  const { data } = await uploadImage(form)

  insertImage({ url: data.url })
}
</script>

<template>
  <VueMarkdownEditor
    :value="modelValue"
    v-model="text"
    :disabled-menus="[]"
    :height="height + 'px'"
    @upload-image="handleUploadImage" />
</template>

<style lang="scss" scoped>
:global(.v-md-editor) {
  box-shadow: none !important;
  @apply border;
}
</style>
