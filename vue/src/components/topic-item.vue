<script setup lang="ts">
import dayjs from 'dayjs'

const { item } = defineProps<{
  item: TopicModel
}>()
</script>

<template>
  <main class="py-5 border-b flex gap-2">
    <UserAvatar :user="item.user" v-if="item.user" />
    <div class="flex flex-col overflow-hidden">
      <router-link
        :to="{ name: 'topic.show', params: { id: item.id } }"
        class="font-bold flex items-top gap-2 mb-1 opacity-95">
        <el-tag type="danger" size="small" effect="plain" v-if="item.recommend">推荐</el-tag>
        <div class="truncate">
          {{ item.title }}
        </div>
      </router-link>
      <div class="flex gap-1 text-xs">
        <router-link
          :to="{ name: 'sign.space', query: { uid: item.user_id } }"
          custom
          #default="{ href }"
          v-if="item.user">
          <a :href="href">{{ item.user.nickname }}</a>
        </router-link>
        <span class="hidden md:inline text-gray-500">更新于 {{ dayjs(item.updated_at).fromNow() }}</span>
      </div>
    </div>
  </main>
</template>

<style lang="scss"></style>
