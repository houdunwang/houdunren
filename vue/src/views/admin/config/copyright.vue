<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="广告语">
      <el-input v-model="config.base.ad"></el-input>
    </el-form-item>
    <el-form-item label="联系微信">
      <el-input v-model="config.base.weixin"></el-input>
    </el-form-item>
    <el-form-item label="联系邮箱">
      <el-input v-model="config.base.email"></el-input>
    </el-form-item>
    <el-form-item label="icp">
      <el-input v-model="config.base.icp"></el-input>
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
