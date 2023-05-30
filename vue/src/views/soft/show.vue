<script setup lang="ts">
const route = useRoute()
const { open } = useUtil()
const { find, model } = useSoft()
const { authorize } = useAuth()
await find(+route.params.id)
const tabName = ref(route.query.commentId ? 'comment' : 'content')
</script>

<template>
  <main v-if="model">
    <section class="bg-white p-5 mb-5 rounded-lg">
      <h1 class="flex justify-between items-center text-lg font-bold">
        {{ model.title }}
        <div class="flex items-center">
          <el-button type="primary" size="default" @click="open(model.download)" v-if="model.download">
            下载软件
          </el-button>
          <el-button
            type="success"
            size="default"
            v-if="authorize()"
            @click="open({ name: 'soft.edit', params: { id: model.id } }, '_blank')">
            编辑
          </el-button>
        </div>
      </h1>
    </section>
    <section class="bg-white p-3 rounded-lg">
      <el-tabs v-model="tabName" type="card" tab-position="top">
        <el-tab-pane label="软件介绍" name="content">
          <v-md-preview :text="model.content" class="!p-0 !m-0"></v-md-preview>
        </el-tab-pane>
        <el-tab-pane label="问题讨论" name="comment">
          <CommentList model="Soft" :id="model.id" />
        </el-tab-pane>
      </el-tabs>
    </section>
  </main>
</template>

<style lang="scss" scoped>
:deep(.github-markdown-body) {
  @apply p-3;
}
</style>
