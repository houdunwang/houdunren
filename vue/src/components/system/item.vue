<script setup lang="ts">
const { isAdministrator } = useUser()

const { item } = defineProps<{
  item: SystemModel
}>()

const emit = defineEmits<{
  del: [id: number]
}>()
</script>

<template>
  <section
    class="border border-gray-200 bg-white group rounded-lg overflow-hidden duration-500 hover:border-indigo-200">
    <router-link :to="{ name: 'system.show', params: { id: item.id } }" class="block overflow-hidden aspect-video">
      <el-image
        :src="item.preview"
        fit="cover"
        :lazy="true"
        class="cursor-pointer aspect-video object-cover group-hover:scale-110 duration-500" />
    </router-link>
    <div class="mt-2">
      <router-link
        :to="{ name: 'system.show', params: { id: item.id } }"
        class="font-bold text-gray-700 text-lg px-5 mb-2 truncate cursor-pointer block">
        {{ item.title }}
      </router-link>
      <p class="px-5 mb-3 text-gray-600 line-clamp-2 leading-relaxed text-sm translate font-light">
        {{ item.description }}
      </p>
      <div class="flex justify-between px-5 py-3 border-t h-12 items-center text-xs font-bold text-gray-600">
        <span>
          <el-tag type="warning" size="small" class="mx-">{{ item.lesson_num }}</el-tag>
          个课程
        </span>
        <span>
          <el-tag type="success" size="small" class="mx-">{{ item.video_num }}</el-tag>
          个视频
        </span>
      </div>
    </div>
    <div class="px-5 border-t py-2 flex items-center justify-between gap-2" v-if="isAdministrator()">
      <router-link :to="{ name: 'system.edit', params: { id: item.id } }">
        <el-button type="success" size="small"> 编辑 </el-button>
      </router-link>
      <el-button type="danger" size="small" class="!ml-0" @click="emit('del', item.id!)">删除</el-button>
    </div>
  </section>
</template>
