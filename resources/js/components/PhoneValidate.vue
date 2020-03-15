<template>
  <el-form-item label="验证码">
    <el-input placeholder="请输入验证码">
      <template slot="append">{{ message }}</template>
    </el-input>
  </el-form-item>
</templat>e

<script>
export default {
  data() {
    return {
      message: '发送验证码'
    }
  },
  methods: {
    send() {}
  }
}
</script>

<style></style>
