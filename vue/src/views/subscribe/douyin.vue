<script setup lang="ts">
const { douyinSubscribe } = useSubscribe()
const form = reactive({ mobile: '', trade_no: '' })
</script>

<template>
  <HdCard>
    <template #header>添加用户</template>
    <el-form label-width="80px" :inline="false" label-position="top">
      <el-form-item label="手机号">
        <el-input v-model="form.mobile"></el-input>
        <hdError name="mobile" />
      </el-form-item>
      <el-form-item label="抖音定单号">
        <el-input v-model="form.trade_no"></el-input>
        <hdError name="trade_no" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="douyinSubscribe(form)">立即创建</el-button>
      </el-form-item>
    </el-form>
  </HdCard>
</template>
