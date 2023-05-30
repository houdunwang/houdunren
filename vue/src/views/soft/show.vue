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
          <el-button type="primary" size="small" @click="open(model.download, '_blank')" v-if="model.download">
            下载软件
          </el-button>
          <el-button
            type="success"
            plain
            size="small"
            v-if="authorize()"
            @click="open({ name: 'soft.edit', params: { id: model.id } }, '_blank')">
            编辑
          </el-button>
          <el-button type="primary" plain size="small" @click="open(model.github, '_blank')" v-if="model.github">
            GitHub
          </el-button>
          <el-button type="warning" plain size="small" @click="open(model.gitee, '_blank')" v-if="model.gitee">
            码云
          </el-button>
        </div>
      </h1>
    </section>
    <section class="bg-white p-3 rounded-lg">
      <el-tabs v-model="tabName" type="card" tab-position="top">
        <el-tab-pane label="软件介绍" name="content">
          <v-md-preview :text="model.content" class="!p-0 !m-0"></v-md-preview>
        </el-tab-pane>
        <el-tab-pane label="使用交流" name="comment">
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
