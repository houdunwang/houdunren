<script setup lang="ts">
import SystemItem from '@/components/system-item.vue'
const { collection, findAll, remove } = useSystem()
await findAll()
</script>

<template>
  <main>
    <div class="bg-white rounded-lg">
      <section>
        <h1 class="text-center xl:py-8 text-xl xl:text-2xl font-bold py-5 opacity-90">新手启航</h1>
        <div class="text-center xl:text-base mx-5 mb-3">
          系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言。
        </div>
      </section>
      <section class="grid grid-flow-row md:grid-cols-2 lg:grid-cols-3 gap-5 p-5">
        <SystemItem v-for="item of collection" :key="item.id" :item="item" @del="remove" />
      </section>
    </div>
  </main>
</template>
