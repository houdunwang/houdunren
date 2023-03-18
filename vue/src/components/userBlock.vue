<script setup lang="ts">
import dayjs from 'dayjs'

const { user } = defineProps<{ user: UserModel }>()
</script>

<template>
  <main class="borde shadow-md bg-white overflow-hidden rounded-lg">
    <el-image :src="user.avatar" fit="cover" :lazy="true" class="w-full" />
    <div class="flex flex-col items-center justify-center py-3 text-slate-700">
      <h2 class="font-bold">{{ user.name }}</h2>
      <small class="text-sm">注册于{{ dayjs(user.created_at).fromNow() }}</small>
      <div class="text-xs mt-2 text-gray-600">ID:{{ user.id }}</div>
    </div>
  </main>
</template>
