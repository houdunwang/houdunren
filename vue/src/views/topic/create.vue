<script setup lang="ts">
import useUtil from '@/composables/hd/useUtil'
const { add } = useTopic()
const form = reactive({
  title: '',
  content: '',
})
const { request } = useUtil()
const store = request((data) => add(data))
</script>

<template>
  <main class="w-page m-auto bg-white p-10 shadow-sm rounded-xl mt-10">
    <h1 class="text-lg font-bold mb-5 opacity-80 flex items-center gap-2">
      <icon-save theme="outline" size="24" fill="#333" />发表贴子
    </h1>

    <el-form :model="form" :inline="false" size="large">
      <el-input v-model="form.title" placeholder="请输入贴子标题" size="large"></el-input>
      <HdError name="title" />
      <div class="mt-5">
        <HdMarkdownEditor v-model="form.content" :height="400" />
        <HdError name="content" />
      </div>
      <el-button type="primary" size="large" @click="store(form)" class="mt-5">发表贴子</el-button>
    </el-form>
  </main>
</template>

<style lang="scss"></style>
