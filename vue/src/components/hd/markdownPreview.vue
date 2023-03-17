<script setup lang="ts">
import hljs from 'highlight.js'
import '@/styles/highlightjs.scss'
import '@/styles/markdown.scss'

const { text } = defineProps<{ text: string }>()
const html = ref<HTMLDivElement>()
html.value = document.createElement('div') as HTMLDivElement
html.value.insertAdjacentHTML('afterbegin', text.replace('class="language-language"', ''))
html.value.querySelectorAll('pre code').forEach((el: any) => {
  hljs.highlightElement(el)
})
</script>

<template>
  <main class="markdown-preview">
    <div v-html="html?.innerHTML"></div>
  </main>
</template>

<style lang="scss" scoped>
.markdown-preview {
  @apply leading-8;
  :deep(a) {
    color: #16a085 !important;
  }
}
</style>
