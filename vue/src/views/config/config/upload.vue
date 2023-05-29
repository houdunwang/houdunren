<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-position="top">
    <el-form-item label="驱动">
      <el-input v-model="config.upload.drive" />
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
