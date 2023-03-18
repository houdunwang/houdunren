<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="网站名称">
      <el-input v-model="config.base.name"></el-input>
    </el-form-item>
    <el-form-item label="域名">
      <el-input v-model="config.base.domain"></el-input>
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
