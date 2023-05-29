<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="80px" label-position="top">
    <el-form-item label="主机">
      <el-input v-model="config.email.host" />
    </el-form-item>
    <el-form-item label="邮箱帐号">
      <el-input v-model="config.email.username" />
    </el-form-item>
    <el-form-item label="密码">
      <el-input v-model="config.email.password" />
    </el-form-item>
    <el-form-item label="端口">
      <el-input v-model="config.email.port" />
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
