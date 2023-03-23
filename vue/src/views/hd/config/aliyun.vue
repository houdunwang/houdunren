<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-position="top">
    <el-form-item label="aliyun_key">
      <el-input v-model="config.aliyun.aliyun_key" />
    </el-form-item>
    <el-form-item label="aliyun_secret">
      <el-input v-model="config.aliyun.aliyun_secret" />
    </el-form-item>
    <el-form-item label="aliyun_oss_block">
      <el-input v-model="config.aliyun.aliyun_oss_block" />
    </el-form-item>
    <el-form-item label="aliyun_oss_endpoint">
      <el-input v-model="config.aliyun.aliyun_oss_endpoint" />
    </el-form-item>
    <el-form-item label="cdn_video_key">
      <el-input v-model="config.aliyun.cdn_video_key" />
    </el-form-item>
    <el-form-item label="cdn_image_domain">
      <el-input v-model="config.aliyun.cdn_image_domain" />
    </el-form-item>
    <el-form-item label="cdn_video_domain">
      <el-input v-model="config.aliyun.cdn_video_domain" />
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
