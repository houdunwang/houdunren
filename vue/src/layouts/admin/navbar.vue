<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { Home } from '@icon-park/vue-next'
const { open } = useUtil()
</script>

<template>
  <div
    class="bg-white relative shadow-sm z-50 py-3 border-b-1 px-5 flex justify-between items-center border-b-4 border-[#574b90]">
    <div
      @click="open('/')"
      class="font-bold flex items-center justify-between text-xl mr-2 text-[#574b90] cursor-pointer hover:opacity-90">
      <home theme="outline" size="26" />
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <UserAvatarMenu />
    </div>
  </div>
</template>
