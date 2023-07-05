<script setup lang="ts">
import dayjs from 'dayjs'
const { item } = defineProps<{
  item: ActivityModel
}>()
const url = computed(() => {
  switch (item.subject_type) {
    case 'App\\Models\\Comment':
      const modelName = item.properties.model.toLocaleLowerCase()
      return `/${modelName}/${item.properties.model_id}` + `?commentId=${item.subject_id}`
    case 'App\\Models\\Lesson':
      return `/lesson/${item.subject_id}`
    case 'App\\Models\\Question':
      return `/question/${item.subject_id}`
    case 'App\\Models\\Sign':
      return `/sign`
    case 'App\\Models\\Topic':
      return `/topic/${item.subject_id}`
    case 'App\\Models\\System':
      return `/system/${item.subject_id}`
  }
})
</script>

<template>
  <main class="py-5 border-b flex items-center gap-3" v-if="item.user">
    <UserAvatar :user="item.user" />
    <div class="flex flex-col gap-1 justify-between overflow-hidden">
      <a :href="url" class="font-bold opacity-95 truncate" target="_blank">
        {{ item.description }}
      </a>
      <div class="text-sm flex items-center gap-2 font-light">
        <el-tag type="danger" size="small" effect="dark" v-if="item.subject_type == 'App\\Models\\Topic'">
          贴子
        </el-tag>
        <el-tag type="success" size="small" effect="dark" v-if="item.subject_type == 'App\\Models\\Lesson'">
          课程
        </el-tag>
        <el-tag type="warning" size="small" effect="dark" v-if="item.subject_type == 'App\\Models\\Sign'">
          签到
        </el-tag>
        <el-tag type="success" size="small" effect="dark" v-if="item.subject_type == 'App\\Models\\Comment'">
          评论
        </el-tag>
        <el-tag type="success" size="small" effect="dark" v-if="item.subject_type == 'App\\Models\\Question'">
          考试题
        </el-tag>
        <el-tag type="danger" size="small" effect="dark" v-if="item.subject_type == 'App\\Models\\System'">
          系统课程
        </el-tag>
        <router-link
          :to="{ name: 'sign.space', query: { uid: item.user.id } }"
          class="text-indigo-800 font-bold opacity-70">
          {{ item.user.nickname }}
        </router-link>
        <span class="text-xs opacity-90">更新于 {{ dayjs(item.updated_at).fromNow() }}</span>
      </div>
    </div>
  </main>
</template>
