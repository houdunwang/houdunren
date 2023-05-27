<script setup lang="ts">
import LessonItem from '@/components/lesson-item.vue'
import DownloadLesson from '@/components/download-lesson.vue'
import Favorite from '@/components/favorite.vue'
import LessonVideoList from '@/components/lesson-video-list.vue'
const { isAdministrator } = useUser()
const { isLogin } = useAuth()
const { findOne, model } = useLesson()
const route = useRoute()
findOne(+route.params.id)
</script>

<template>
  <main class="!w-full !p-0 !-mt-1 relative z-10" v-if="model">
    <section class="bg py-5 xl:py-8 text-white relative overflow-hidden">
      <div class="2xl:w-page mx-auto p-2">
        <h1 class="font-bold text-3xl 2xl:text-4xl flex items-start gap-2">
          {{ model.title }}
          <el-tag type="danger" effect="dark" class="!hidden md:!flex items-center">课程</el-tag>
        </h1>
        <p class="mt-5 opacity-80 pb-10">
          {{ model.description }}
        </p>
        <div class="flex items-center gap-2">
          <DownloadLesson :download_address="model?.system?.download_address" size="default" />
          <Favorite model="Lesson" :id="model.id" v-if="isLogin()" />
          <router-link :to="{ name: 'lesson.edit', params: { id: model.id } }" v-if="isAdministrator()">
            <el-button type="success" size="small" plain> 编辑 </el-button>
          </router-link>
        </div>
      </div>
      <div class="top-bg"></div>
    </section>
    <section class="2xl:w-page mx-auto p-2 grid md:grid-cols-12 items-start gap-5">
      <LessonVideoList :lessonId="model.id" :videos="model.videos" class="mt-5 2xl:col-span-9 md:col-span-8" />
      <div class="-mt-[100px] hidden md:flex md:col-span-4 2xl:col-span-3">
        <LessonItem :item="model" />
      </div>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.top-bg {
  overflow: hidden;
  position: absolute;
  z-index: -1;
  background-image: url('/images/space-top-bg.jpg');
  background-position: center;
  transform: scale(1.5);
  filter: blur(20px);
  @apply top-0 left-0 right-0 bottom-0;
}
</style>
