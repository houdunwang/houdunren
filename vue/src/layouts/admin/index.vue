<script setup lang="ts">
import Navbar from './navbar.vue'
</script>

<template>
  <main class="h-screen w-screen">
    <section class="content grid grid-rows-[auto_1fr] overflow-hidden">
      <Navbar />
      <div class="flex justify-center py-3 mt-10">
        <div
          v-if="$route.name != 'admin'"
          @click="$router.push({ name: 'admin' })"
          class="flex items-center justify-center gap-3 border rounded-md cursor-pointer p-2 bg-white hover:bg-gray-50 hover:shadow-sm">
          <icon-handle-left theme="filled" size="24" fill="#333" />
          系统菜单
        </div>
      </div>
      <div class="overflow-y-auto pb-32 w-screen xl:w-[1000px] m-auto">
        <router-view #default="{ Component, route }">
          <component :is="Component" class="m-5" :key="route.fullPath" />
        </router-view>
      </div>
    </section>
  </main>
</template>
