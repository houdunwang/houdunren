<script setup lang="ts">
import UserAvatar from '@/components/userAvatar.vue'

import dayjs from 'dayjs'
const { question } = defineProps<{ question: QuestionModel }>()
</script>

<template>
  <main class="flex justify-between items-center">
    <div class="flex items-center gap-2">
      <UserAvatar :user="question.user!" class="w-10 h-10" />
      <div class="flex flex-col">
        <router-link :to="{ name: 'sign.space', query: { uid: question.user?.id } }" class="font-bold text-[#16a085]">
          {{ question.user?.name }}
        </router-link>
        <span class="text-sm flex items-center gap-1 opacity-80">
          <icon-history theme="filled" fill="#333" />
          发布于 {{ dayjs(question.created_at).fromNow() }}</span
        >
      </div>
    </div>
    <slot />
  </main>
</template>
