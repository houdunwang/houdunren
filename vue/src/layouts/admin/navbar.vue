<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { Home } from '@icon-park/vue-next'
const { open } = useUtil()
</script>

<template>
  <div class="bg-white relative shadow-lg z-50 py-3 px-5 flex justify-between items-center border-b-4 border-slate-500">
    <div
      @click="open('/')"
      class="font-bold flex items-center justify-between text-xl text-slate-600 cursor-pointer hover:opacity-90">
      <home theme="outline" size="25" />
      <span class="text-base font-normal">系统管理</span>
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <UserAvatarMenu />
    </div>
  </div>
</template>
