<script setup lang="ts">
import useUtil from '@/composables/hd/useUtil'
const route = useRoute()
const { add, model, findOne, update } = useTopic()
const { isAdministrator } = useAuth()
const { request } = useUtil()
if (route.params.id) {
  findOne(+route.params.id)
}
const store = request(() => {
  return route.params.id ? update(model.value) : add(model.value)
})
</script>

<template>
  <main class="w-page m-auto bg-white p-10 shadow-sm rounded-xl mt-10">
    <h1 class="text-lg font-bold mb-5 opacity-80 flex items-center gap-2">
      <icon-save theme="outline" size="24" fill="#333" />发表贴子
    </h1>

    <el-form :inline="false" size="large">
      <el-input v-model="model.title" placeholder="请输入贴子标题" size="large" />
      <HdError name="title" />
      <div class="mt-3" v-if="isAdministrator()">
        <el-input v-model="model.filename" placeholder="markdown文件" size="large" />
        <HdError name="filename" />
      </div>
      <div class="mt-3" v-if="model.content">
        <HdMarkdownEditor v-model="model.content" :height="400" />
        <HdError name="content" />
      </div>
      <el-button type="primary" size="large" @click="store(model)" class="mt-5">发表贴子</el-button>
    </el-form>
  </main>
</template>

<style lang="scss"></style>
