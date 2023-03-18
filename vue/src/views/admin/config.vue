<script setup lang="ts">
import baseVue from './config/base.vue'
import aliyun from './config/aliyun.vue'
import sms from './config/sms.vue'
import email from './config/email.vue'
import wechat from './config/wechat.vue'
import copyright from './config/copyright.vue'

const { config, get, update } = useConfig()
await get()
const tab = ref('base')
</script>

<template>
  <main v-if="config">
    <el-tabs v-model="tab" type="border-card" tab-position="top">
      <el-tab-pane label="基础配置" name="base">
        <baseVue :config="config" />
      </el-tab-pane>
      <el-tab-pane label="版权信息" name="copyright">
        <copyright :config="config" />
      </el-tab-pane>
      <el-tab-pane label="阿里云" name="aliyun">
        <aliyun :config="config" />
      </el-tab-pane>
      <el-tab-pane label="短信" name="sms">
        <sms :config="config" />
      </el-tab-pane>
      <el-tab-pane label="邮箱" name="email">
        <email :config="config" />
      </el-tab-pane>
      <el-tab-pane label="微信" name="wechat">
        <wechat :config="config" />
      </el-tab-pane>
    </el-tabs>

    <el-button type="primary" size="default" @click="update" class="mt-3">保存提交</el-button>
  </main>
</template>

<style lang="scss"></style>
