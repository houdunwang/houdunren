<script setup lang="ts">
//章节课程列表，视频播放页面使用
const { lessons } = defineProps<{ lessons?: LessonModel[] }>()
</script>

<template>
  <main v-if="lessons">
    <el-dropdown trigger="click" size="default">
      <el-button type="warning" size="small" v-bind="$attrs">章节列表</el-button>
      <template #dropdown>
        <el-dropdown-menu>
          <el-dropdown-item v-for="item in lessons" :key="item.id">
            <router-link :to="{ name: 'lesson.show', params: { id: item.id } }"> {{ item.title }}</router-link>
          </el-dropdown-item>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </main>
</template>
