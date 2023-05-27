<script setup lang="ts">
import router from '@/plugins/router'
import { ElMessage } from 'element-plus'
const route = useRoute()
const content = ref((route.query.content as string) || '')
const onSubmit = () => {
  if (!content.value) {
    return ElMessage.error('搜索内容不能为空')
  }
  router.push({ name: 'video.search', query: { content: content.value } })
}
</script>

<template>
  <main class="flex items-center gap-3">
    <el-input v-model="content" placeholder="输入课程关键字用于搜索" size="large" clearable @change="onSubmit" />
    <el-button type="primary" size="large" @click="onSubmit">搜索</el-button>
  </main>
</template>
