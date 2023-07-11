<script setup lang="ts">
const { isAdministrator } = useUser()
const { remove } = useLesson()
const { item, showType } = defineProps<{
  item: LessonModel
  showType?: 'image' | 'color'
}>()

defineEmits(['del'])

const colors = [
  '#f69679',
  '#f9ad81',
  '#a3d39c',
  '#82ca9c',
  '#7da7d9',
  '#8393ca',
  '#8781bd',
  '#a186be',
  '#bd8cbf',
  '#f5989d',
  '#f49ac1',
  '#fbaf5d',
  '#acd373',
]
const index = Math.floor(Math.random() * colors.length)
const color = colors[index]
const formatTitle = item.title.replace(/第.*?章/, '')
</script>

<template>
  <section
    class="border border-gray-200 rounded-lg bg-white overflow-hidden group hover:border-indigo-200 flex flex-col">
    <div class="">
      <router-link :to="{ name: 'lesson.show', params: { id: item.id } }">
        <div class="overflow-hidden flex aspect-video" v-if="showType == 'image'">
          <el-image
            :src="item.preview"
            fit="cover"
            :lazy="true"
            class="aspect-video object-cover hover:scale-105 duration-500" />
        </div>
        <div class="overflow-hidden" v-else>
          <div
            class="aspect-video flex flex-col items-center py-5 hover:scale-110 duration-500"
            :style="`background-color:${color}`">
            <el-image src="/assets/xj.jpg" fit="cover" :lazy="true" class="w-16 h-16 object-cover rounded-full" />
            <h2
              class="text-2xl text-white outline-4 outline-gray-900 relative w-full flex justify-center mt-2 font-black h-10">
              <div class="absolute text-white z-10">
                {{ formatTitle }}
              </div>
              <div class="absolute" style="text-stroke: 5px #333">
                {{ formatTitle }}
              </div>
            </h2>
            <div
              class="rounded-lg bg-[#333] text-white flex justify-center px-5 py-1 text-xs opacity-75 mt-2"
              v-if="item.system?.title">
              {{ item.system?.title }}
            </div>
            <div class="rounded-lg bg-[#333] text-white flex justify-center px-5 py-1 text-xs opacity-75 mt-2" v-else>
              大叔晚八点直播
            </div>
          </div>
        </div>
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
      <router-link :to="{ name: 'lesson.edit', params: { id: item.id } }" target="_blank">
        <el-button type="success" size="small"> 编辑 </el-button>
      </router-link>
      <el-button type="danger" size="small" @click="remove(item.id)">删除</el-button>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
