<script setup lang="ts">
const { user } = defineProps<{ user: UserModel }>()
</script>

<template>
  <main class="bg-white overflow-hidden rounded-md">
    <el-image
      :src="user.avatar"
      fit="cover"
      :lazy="true"
      class="w-full cursor-pointer"
      @click="$router.push({ name: 'member' })" />
    <div class="flex flex-col items-center justify-center py-2 text-slate-700">
      <h2 class="font-bold text-sm opacity-90">{{ user.name }}</h2>
      <div class="text-xs flex flex-col justify-center items-center opacity-90 mt-1">
        <div class="text-xs text-gray-600">UID:{{ user.id }}</div>
      </div>
    </div>
  </main>
</template>
