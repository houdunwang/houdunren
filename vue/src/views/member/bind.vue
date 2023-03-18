<script setup lang="ts">
import Email from './bind/email.vue'
import Mobile from './bind/mobile.vue'
import wechat from './bind/wechat.vue'
const tab = ref('mobile')
</script>

<template>
  <el-tabs v-model="tab" type="card" tab-position="top">
    <el-tab-pane label="手机绑定" name="mobile">
      <mobile />
    </el-tab-pane>
    <el-tab-pane label="邮箱绑定" name="email">
      <email />
    </el-tab-pane>
    <el-tab-pane label="微信绑定" name="wechat">
      <wechat v-if="tab == 'wechat'" />
    </el-tab-pane>
  </el-tabs>
</template>

<style lang="scss"></style>
