<script setup lang="ts">
import dayjs from 'dayjs'
const { isAdministrator } = useUser()
const { video } = defineProps<{
  video: ShortVideoModel
}>()

const emit = defineEmits<{
  del: [id: number]
}>()
</script>

<template>
  <section
    class="border border-gray-200 rounded-lg bg-white overflow-hidden hover:scale-105 duration-500 hover:border-indigo-200 flex flex-col">
    <div class="">
      <router-link :to="{ name: 'shortvideo.show', params: { id: video.id } }" target="_blank">
        <el-image :src="video.preview" fit="cover" :lazy="true" class="aspect-video" />
      </router-link>
    </div>
    <div class="mt-3 flex flex-col justify-start">
      <router-link
        :to="{ name: 'shortvideo.show', params: { id: video.id } }"
        target="_blank"
        class="font-bold text-gray-700 mb-3 text-lg px-5 truncate hover:text-green-700 flex justify-between items-baseline">
        {{ video.title }}
        <span class="text-xs font-normal">{{ dayjs(video.created_at).fromNow() }}</span>
      </router-link>
    </div>

    <div class="flex items-center justify-between gap-2 px-5 py-3 border-t" v-if="isAdministrator()">
      <router-link :to="{ name: 'shortvideo.edit', params: { id: video.id } }" target="_blank">
        <el-button type="success" size="small"> 编辑 </el-button>
      </router-link>
      <el-button type="danger" size="small" @click="emit('del', video.id)">删除</el-button>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
