<script setup lang="ts"></script>

<template>
  <main class="grid grid-flow-row gap-3 grid-cols-3">
    <div @click="$router.push({ name: 'module' })">
      <icon-blocks-and-arrows theme="filled" size="35" />
      应用模块
    </div>
    <div @click="$router.push({ name: 'config' })">
      <icon-setting theme="filled" size="35" />
      系统设置
    </div>
    <div @click="$router.push({ name: 'module.create' })">
      <icon-sketch theme="filled" size="35" />
      模块设计
    </div>
  </main>
</template>

<style lang="scss" scoped>
main {
  div {
    @apply p-3 flex flex-col items-center justify-center border rounded-md bg-gray-50 shadow-inner cursor-pointer py-6;
  }
}
</style>
