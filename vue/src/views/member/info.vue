<script setup lang="ts">
import baseVue from './info/base.vue'
import avatar from './info/avatar.vue'
import deleteVue from './info/delete.vue'
import password from './info/password.vue'
const tab = ref('password')
</script>

<template>
  <main>
    <el-tabs v-model="tab" type="card" tab-position="top">
      <el-tab-pane label="基本资料" name="base">
        <baseVue />
      </el-tab-pane>
      <el-tab-pane label="设置头像" name="avatar">
        <avatar />
      </el-tab-pane>
      <el-tab-pane label="修改密码" name="password">
        <password />
      </el-tab-pane>
      <el-tab-pane label="注销帐号" name="delete">
        <deleteVue />
      </el-tab-pane>
    </el-tabs>
  </main>
</template>
