<script setup lang="ts">
const { config } = defineProps<{ config: ConfigModel }>()
</script>

<template>
  <el-form label-width="80px" label-position="top">
    <el-form-item label="sign">
      <el-input v-model="config.sms.aliyun_code_sign" />
    </el-form-item>
    <el-form-item label="template">
      <el-input v-model="config.sms.aliyun_code_template" />
    </el-form-item>
    <el-form-item label="有效期、单位秒">
      <el-input v-model="config.sms.code_timeout" />
    </el-form-item>
  </el-form>
</template>

<style lang="scss"></style>
