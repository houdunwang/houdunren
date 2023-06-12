<script setup lang="ts">
import dayjs from 'dayjs'

const { user } = defineProps<{ user: UserModel }>()
</script>

<template>
  <main class="borde bg-white overflow-hidden rounded-lg">
    <UserAvatar :user="user" fit="cover" class="w-full h-auto rounded-none" />

    <div class="flex flex-col items-center justify-center py-3 text-slate-700">
      <h2 class="font-bold">{{ user.nickname }}</h2>
      <small class="text-sm">注册于{{ dayjs(user.created_at).fromNow() }}</small>
      <div class="text-xs mt-2 text-gray-600">ID:{{ user.id }}</div>
    </div>
  </main>
</template>
