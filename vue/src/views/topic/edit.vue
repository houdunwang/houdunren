<script setup lang="ts">
import useUtil from '@/composables/hd/useUtil'

const route = useRoute()
const { findOne, model, update } = useTopic()
const { request } = useUtil()
findOne(+route.params.id)
const onSubmit = request((data) => update(data))
</script>

<template>
  <main class="w-page m-auto bg-white p-10 shadow-sm rounded-xl mt-10" v-if="model">
    <h1 class="text-lg font-bold mb-5 opacity-80 flex items-center gap-2">
      <icon-save theme="outline" size="24" fill="#333" />发表贴子
    </h1>

    <el-form :model="model" :inline="false" size="large">
      <el-input v-model="model.title" placeholder="请输入贴子标题" size="large"></el-input>
      <HdError name="title" />
      <div class="mt-5">
        {{ model.content }}44
        <HdMarkdownEditor v-model="model.content" :height="400" />
        <HdError name="content" />
      </div>
      <el-button type="primary" size="large" @click="onSubmit(model)" class="mt-5">保存提交</el-button>
    </el-form>
  </main>
</template>

<style lang="scss"></style>
