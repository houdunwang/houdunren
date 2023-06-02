<script setup lang="ts">
import dayjs from 'dayjs'

const { video, showTime = true } = defineProps<{ video: VideoModel; showTime?: boolean }>()
</script>

<template>
  <div class="block md:py-3 py-2 border-b">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
      <router-link
        :to="{ name: 'video.show', params: { id: video.id } }"
        class="flex items-center text-base cursor-pointer hover:text-[#16a085]">
        <icon-play theme="outline" class="mr-2 text-[#16a085] hidden md:block" />
        <div class="opacity-90 flex justify-between items-center">
          <slot name="title" :video="video">
            {{ video.title }}
          </slot>
          <span class="flex items-center text-xs ml-2 text-gray-500" v-if="showTime">
            <icon-history theme="outline" class="mr-1" />
            {{ dayjs(video.created_at).fromNow() }}
          </span>
        </div>
      </router-link>
      <section class="text-xs font-light flex items-center gap-2">
        <el-tag
          type="info"
          size="small"
          round
          effect="plain"
          @click="$router.push({ name: 'lesson.show', params: { id: video.lesson_id } })"
          class="cursor-pointer">
          {{ video.lesson.title }}
        </el-tag>
      </section>
    </div>
  </div>
</template>
