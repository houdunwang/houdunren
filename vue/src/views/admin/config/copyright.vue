<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="广告语">
      <el-input v-model="config.copyright.ad"></el-input>
    </el-form-item>
    <el-form-item label="联系微信">
      <el-input v-model="config.copyright.weixin"></el-input>
    </el-form-item>
    <el-form-item label="联系邮箱">
      <el-input v-model="config.copyright.email"></el-input>
    </el-form-item>
    <el-form-item label="其他信息">
      <el-input v-model="config.copyright.other"></el-input>
    </el-form-item>
    <el-form-item label="icp">
      <el-input v-model="config.copyright.icp"></el-input>
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
