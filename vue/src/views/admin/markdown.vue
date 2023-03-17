<script setup lang="ts">
import { ref } from 'vue'
const text = ref('')
const previewContent = ref(
  `
  <pre><code>
    import { ref } from 'vue'
    const text = ref('')
    const previewContent = ref('')
  </code></pre>
`,
)
</script>

<template>
  <main>
    <el-card shadow="always" :body-style="{ padding: '20px' }">
      <template #header> 编辑器组件 </template>
      <HdMarkdownEditor v-model="text" />
      <div class="p-3 border bg-white mt-3">
        {{ text }}
      </div>
    </el-card>

    <el-card shadow="always" class="mt-3">
      <template #header> 预览组件 </template>
      <v-md-preview :text="previewContent"></v-md-preview>
      <HdMarkdownPreview :text="previewContent" />
    </el-card>
  </main>
</template>
