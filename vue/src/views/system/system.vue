<script setup lang="ts">
const { collection, findAll, remove } = useSystem()
await findAll()
</script>

<template>
  <main>
    <div class="bg-white rounded-lg">
      <section>
        <h1 class="text-center xl:py-8 text-xl xl:text-2xl font-bold py-5 opacity-90">系统课程</h1>
        <div class="text-center xl:text-base mx-5 mb-3">
          系统课程指从零开始学习一门编程语言，比如从零开始学习Javascript编程语言。
        </div>
      </section>
      <section class="grid grid-flow-row md:grid-cols-2 lg:grid-cols-3 gap-5 p-5" v-if="collection.length">
        <SystemItem v-for="item of collection" :key="item.id" :item="item" @del="remove" />
      </section>
      <section class="text-center p-3 border-t mt-10 flex justify-center gap-2 items-center">
        <icon-info theme="filled" fill="#707070" :strokeWidth="3" /> 暂无课程
      </section>
    </div>
  </main>
</template>
