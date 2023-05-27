<script setup lang="ts">
defineEmits(['del'])
const { isAdministrator } = useUser()
const { remove } = useLesson()

const { item } = defineProps<{
  item: LessonModel
}>()
</script>

<template>
  <section
    class="border border-gray-200 rounded-lg bg-white overflow-hidden hover:scale-105 duration-500 hover:border-indigo-200 flex flex-col">
    <div class="">
      <router-link :to="{ name: 'lesson.show', params: { id: item.id } }">
        <el-image :src="item.preview" fit="cover" :lazy="true" class="aspect-video object-cover" />
      </router-link>
    </div>
    <div class="mt-3 flex flex-col justify-start">
      <router-link
        :to="{ name: 'lesson.show', params: { id: item.id } }"
        class="font-bold text-gray-700 mb-3 text-base px-5 truncate opacity-95">
        {{ item.title }}
      </router-link>
      <p class="px-5 mb-3 text-gray-600 text-sm truncate">
        {{ item.description }}
      </p>
    </div>

    <div class="flex justify-between px-5 py-3 border-t h-12 items-center text-xs font-bold text-gray-600">
      <div>
        <el-tag type="warning" size="small" class="mx-">{{ item.video_num }}</el-tag>
        个视频
      </div>
    </div>
    <div class="flex items-center justify-between gap-2 px-5 py-3 border-t" v-if="isAdministrator()">
      <router-link :to="{ name: 'lesson.edit', params: { id: item.id } }">
        <el-button type="success" size="small"> 编辑 </el-button>
      </router-link>
      <el-button type="danger" size="small" @click="remove(item.id)">删除</el-button>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
