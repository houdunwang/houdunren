<script setup lang="ts">
import dayjs from 'dayjs'

const { getQuestionRankTotal } = useQuestionAnswer()
const answers = await getQuestionRankTotal()
</script>

<template>
  <HdCard>
    <template #header>
      <div class="flex items-center gap-1">
        <icon-ranking theme="filled" size="20" fill="#333" />
        本周总分前10名
      </div>
    </template>
    <section class="-mt-5">
      <div class="border-b py-3 flex items-center justify-between" v-for="item of answers" :key="item.id">
        <div class="flex justify-start gap-2 h-12">
          <UserAvatar :user="item.user" />
          <div class="flex flex-col justify-between">
            <router-link :to="{ name: 'sign.space', query: { uid: item.user?.id } }">
              {{ item.user?.name }}
            </router-link>
            <span class="text-xs">注册于 {{ dayjs(item.user?.created_at).fromNow() }} </span>
          </div>
        </div>
        <div class="">{{ item.total }} 分</div>
      </div>
    </section>
  </HdCard>
</template>
