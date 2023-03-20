<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { Home } from '@icon-park/vue-next'
</script>

<template>
  <div
    class="bg-white relative shadow-sm z-50 py-3 border-b-1 px-5 flex justify-between items-center border-b-4 border-[#574b90]">
    <div class="flex items-center">
      <home theme="outline" size="26" fill="#574b90" @click="$router.push({ name: 'home' })" class="cursor-pointer" />
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <UserAvatarMenu />
    </div>
  </div>
</template>
