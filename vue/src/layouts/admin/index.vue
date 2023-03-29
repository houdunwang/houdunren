<script setup lang="ts">
import Navbar from '@/layouts/admin/navbar.vue'
</script>

<template>
  <main class="h-screen w-screen">
    <section class="content bg-gray-100 grid grid-rows-[auto_1fr] overflow-hidden">
      <Navbar />
      <div class="flex justify-center py-3 mt-10">
        <el-button
          type="info"
          size="default"
          round
          :color="$route.name == 'hd' ? '#626aef' : ''"
          @click="$router.push({ name: 'hd' })">
          应用模块
        </el-button>
        <el-button
          type="info"
          size="default"
          :color="$route.name == 'hd.config' ? '#626aef' : ''"
          round
          @click="$router.push({ name: 'hd.config' })">
          系统设置
        </el-button>
      </div>
      <div class="overflow-y-auto pb-32 w-screen xl:w-[1000px] m-auto">
        <router-view #default="{ Component, route }">
          <component :is="Component" class="m-5" :key="route.fullPath" />
        </router-view>
      </div>
    </section>
  </main>
</template>
