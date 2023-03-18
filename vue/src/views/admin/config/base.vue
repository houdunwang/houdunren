<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="80px" label-position="top">
    <el-form-item label="appid">
      <el-input v-model="config.wechat.appid" />
    </el-form-item>
    <el-form-item label="appsecret">
      <el-input v-model="config.wechat.appsecret" />
    </el-form-item>
    <el-form-item label="token">
      <el-input v-model="config.wechat.token" />
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
