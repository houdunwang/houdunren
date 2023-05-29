<script setup lang="ts">
import baseVue from './config/base.vue'
import aliyun from './config/aliyun.vue'
import subscribe from './config/subscribe.vue'
import sms from './config/sms.vue'
import email from './config/email.vue'
import wechat from './config/wechat.vue'
import upload from './config/upload.vue'
const { update, all } = useConfig()
const config = ref(await all())
const tab = ref('base')
</script>

<template>
  <main class="bg-white p-5 rounded-lg" v-if="config">
    <el-form label-width="80px" label-position="top">
      <el-tabs v-model="tab" type="card" tab-position="top">
        <el-tab-pane label="基本配置" name="base" class="border p-3 rounded-md">
          <baseVue :config="config" />
        </el-tab-pane>
        <el-tab-pane label="订阅" name="subscribe">
          <subscribe :config="config" />
        </el-tab-pane>
        <el-tab-pane label="短信" name="sms">
          <sms :config="config" />
        </el-tab-pane>
        <el-tab-pane label="阿里云" name="aliyun">
          <aliyun :config="config" />
        </el-tab-pane>
        <el-tab-pane label="邮箱" name="email">
          <email :config="config" />
        </el-tab-pane>
        <el-tab-pane label="微信" name="wechat">
          <wechat :config="config" />
        </el-tab-pane>
        <el-tab-pane label="上传" name="upload">
          <upload :config="config" />
        </el-tab-pane>
      </el-tabs>

      <el-button type="primary" size="default" @click="update(config!)" class="mt-3">保存提交</el-button>
    </el-form>
  </main>
</template>

<style lang="scss" scoped>
:deep(.el-card__header) {
  @apply p-2 pl-5 bg-gray-50;
}
</style>
