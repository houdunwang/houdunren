<script setup lang="ts">
const douyin = new URL(`../../../public/live-qr/douyin.png`, import.meta.url).href
const bilibili = new URL(`../../../public/live-qr/bilibili.png`, import.meta.url).href
const kuaisou = new URL(`../../../public/live-qr/kuaisou.png`, import.meta.url).href
</script>

<template>
  <HdCard class="mb-32">
    <template #header>
      <h2 class="flex flex-col md:flex-row justify-between items-center">
        直播平台
        <router-link to="/" class="text-gray-800 opacity-80 font-light"> 每晚八点直播，欢迎朋友们的到来 </router-link>
      </h2>
    </template>
    <template #default>
      <div class="2xlp-5 flex flex-col lg:flex-row gap-2 lg:gap-6 2xl:gap-20 items-start">
        <el-image :src="douyin" fit="fill" :lazy="true" class="border"></el-image>
        <el-image :src="bilibili" fit="fill" :lazy="true" class="border"></el-image>
        <el-image :src="kuaisou" fit="fill" :lazy="true" class="border"></el-image>
      </div>
    </template>
  </HdCard>
</template>
