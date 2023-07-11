<script setup lang="ts">
import router from '@/plugins/router'
import { ElMessage, ElMessageBox } from 'element-plus'

const route = useRoute()
const { open } = useUtil()
const { find, model } = useSoft()
const { isAdministrator, isLogin } = useAuth()
const { user } = useUserStore()
const { config } = useConfigStore()
await find(+route.params.id)
const tabName = ref(route.query.commentId ? 'comment' : 'content')

const download = () => {
  if (!isLogin()) {
    return router.push({ name: RouteName.LOGIN })
  }
  if (user?.isSubscribe) {
    ElMessageBox.alert(config!.soft.download)
  } else {
    router.push({ name: 'subscribe' })
  }
}
</script>

<template>
  <main v-if="model">
    <section class="bg-white p-5 mb-5 rounded-lg">
      <h1 class="flex justify-between items-center text-lg font-bold">
        <div class="flex items-center gap-2">
          <span class="opacity-90 font-bold text-lg">{{ model.title }}</span>
          <el-tag type="success" size="small" effect="plain">version: {{ model.version }}</el-tag>
        </div>

        <div class="flex items-center">
          <el-button type="primary" size="small" @click="download()"> 下载软件 </el-button>
          <!-- <el-button type="success" size="small" @click="open({ name: 'member.secret' }, '_blank')" v-if="!model.free">
            查看密钥
          </el-button> -->
          <el-button
            type="primary"
            color="#16a085"
            size="small"
            @click="open(model.lesson, '_blank')"
            v-if="model.lesson">
            开发教程
          </el-button>
          <el-button
            type="danger"
            size="small"
            @click="
              open(
                'https://doc.houdunren.com/%E5%90%8E%E7%9B%BE%E4%BA%BA%E8%BD%AF%E4%BB%B6/%E5%B8%B8%E8%A7%81%E9%97%AE%E9%A2%98.html',
                '_blank',
              )
            ">
            常见问题
          </el-button>

          <el-button type="primary" plain size="small" @click="open(model.github, '_blank')" v-if="model.github">
            GitHub
          </el-button>
          <el-button type="warning" plain size="small" @click="open(model.gitee, '_blank')" v-if="model.gitee">
            码云
          </el-button>
          <el-button
            type="success"
            plain
            size="small"
            v-if="isAdministrator()"
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
