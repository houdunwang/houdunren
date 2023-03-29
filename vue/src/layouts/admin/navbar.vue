<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { Home } from '@icon-park/vue-next'

const { open } = useUtil()
const { config } = useConfigStore()
</script>

<template>
  <div
    class="bg-white relative shadow-sm z-50 py-3 border-b-1 px-5 flex justify-between items-center border-b-4 border-[#574b90]"
    v-if="config">
    <!-- <div class="flex items-center">
      <home theme="outline" size="26" fill="#574b90" @click="$router.push({ name: 'home' })" class="cursor-pointer" />
    </div> -->
    <div
      @click="open('/')"
      class="font-bold flex items-center justify-between text-xl mr-2 text-[#574b90] cursor-pointer hover:opacity-90">
      <home theme="outline" size="26" />
      <span class="font-sans">{{ config.base.name }} </span>
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <UserAvatarMenu />
    </div>
  </div>
</template>
