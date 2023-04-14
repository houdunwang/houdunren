<script setup lang="ts"></script>

<template>
  <main class="grid grid-flow-row gap-5 grid-cols-3">
    <div @click="$router.push({ name: 'module' })">
      <icon-blocks-and-arrows theme="outline" size="35" />
      应用模块
    </div>
    <div @click="$router.push({ name: 'config' })">
      <icon-all-application theme="outline" size="35" />
      系统设置
    </div>
    <div @click="$router.push({ name: 'module.create' })">
      <icon-sketch theme="outline" size="35" />
      模块设计
    </div>
  </main>
</template>

<style lang="scss" scoped>
main {
  div {
    @apply p-3 flex flex-col items-center justify-center gap-1 border rounded-2xl bg-slate-600 text-white shadow-inner cursor-pointer py-6 hover:scale-105 hover:bg-slate-500 duration-300 text-base;
  }
}
</style>
