<script setup lang="ts">
const { createMenu } = useWechatMenu()
</script>

<template>
  <main>
    <el-alert
      title="菜单创建需要一些时间，你可以取关微信后，再关注查看效果"
      type="warning"
      effect="light"
      show-icon
      class="flex items-center"></el-alert>

    <HdCard class="mt-3">
      <template #header> 创建微信菜单 </template>
      <div class="p-5">
        <el-button type="primary" size="default" @click="createMenu">生成菜单</el-button>
      </div>
    </HdCard>
  </main>
</template>

<style lang="scss"></style>
