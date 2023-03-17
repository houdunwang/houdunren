<script setup lang="ts">
import HistoryMenu from '@/layouts/admin/historyMenu.vue'
import leftMenu from '@/layouts/admin/leftMenu.vue'
import Navbar from '@/layouts/admin/navbar.vue'
</script>

<template>
  <main class="admin h-screen w-screen">
    <!-- <leftMenu /> -->
    <section class="content bg-gray-100 grid grid-rows-[auto_1fr] overflow-hidden">
      <div>
        <Navbar />
        <!-- <HistoryMenu /> -->
      </div>
      <div class="overflow-y-auto pb-32">
        <router-view #default="{ Component, route }">
          <component :is="Component" class="m-5" :key="route.fullPath" />
        </router-view>
      </div>
    </section>
  </main>
</template>
