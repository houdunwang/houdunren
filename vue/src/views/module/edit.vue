<script setup lang="ts">
const { update, find, model } = useModule()
const route = useRoute()
await find(route.query.id)
</script>

<template>
  <el-card shadow="never" :body-style="{ padding: '20px' }" v-if="model">
    <template #header>【{{ model.name }}】 模块配置 </template>
    <el-form :model="model" ref="form" label-width="80px" :inline="false">
      <el-form-item label="域名">
        <el-input v-model="model.domain" placeholder="模块访问域名，需要添加 http 或 https"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="update">保存更新</el-button>
      </el-form-item>
    </el-form>
  </el-card>
</template>

<style lang="scss"></style>
