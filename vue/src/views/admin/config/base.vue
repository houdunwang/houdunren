<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="系统名称">
      <el-input v-model="config.base.name" placeholder="用于会员资料等页面顶部显示"></el-input>
    </el-form-item>
  </el-form>
</template>
