<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="120px" size="default" label-position="top">
    <el-form-item label="网站名称">
      <el-input v-model="config.base.name"></el-input>
    </el-form-item>
    <el-form-item label="菜单域名">
      <el-input v-model="config.base.domain"></el-input>
    </el-form-item>
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
    <el-form-item label="图形验证码">
      <el-checkbox v-model="config.base.captcha_disable" label="开启" :indeterminate="false"></el-checkbox>
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
