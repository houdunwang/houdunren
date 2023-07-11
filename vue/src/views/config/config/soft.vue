<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="下载地址">
      <el-input rows="5" v-model="config.soft.download" placeholder="软件下载地址" />
    </el-form-item>
  </el-form>
</template>
