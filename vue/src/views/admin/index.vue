<script setup lang="ts">
import AppList from '@/components/appList.vue'
</script>

<template>
  <main class="m-auto p-5 lg:w-10/12 xl:w-8/12 2xl:w-6/12">
    <div class="flex justify-center py-3">
      <el-button type="info" size="default" round>应用模块</el-button>
      <el-button type="success" size="default" color="#626aef" round>系统设置</el-button>
    </div>
    <AppList />
  </main>
</template>

<style lang="scss"></style>
