<script setup lang="ts"></script>

<template>
  <HdCard class="mb-32">
    <template #header>
      <h2 class="flex flex-col md:flex-row justify-between items-center">
        直播平台
        <router-link to="/" class="text-gray-800 opacity-80 font-light"> 每晚八点直播，欢迎朋友们的到来 </router-link>
      </h2>
    </template>
    <template #default>
      <div class="grid md:grid-cols-3 gap-2">
        <el-image src="/assets/live-qr/douyin.png" fit="fill" :lazy="true" class="border"></el-image>
        <el-image src="/assets/live-qr/bilibili.png" fit="fill" :lazy="true" class="border"></el-image>
        <el-image src="/assets/live-qr/kuaisou.png" fit="fill" :lazy="true" class="border"></el-image>
      </div>
    </template>
  </HdCard>
</template>
