<script setup lang="ts">
import DownloadLesson from '@/components/download-lesson.vue'
import LessonVideoList from '@/components/lesson-video-list.vue'
import SystemLessonDropdown from '@/components/system-lesson-dropdown.vue'
import useVideo from '@/composables/useVideo'
import router from '@/plugins/router'
import { ElMessage } from 'element-plus'
const { user } = useUserStore()
const { open } = useUtil()
const route = useRoute()
const { findOne, model, nextVideo, preVideo } = useVideo()
if (!user?.isSubscribe) {
  ElMessage.error('请订阅后学习')
  router.push({ name: 'subscribe' })
}
await findOne(route.params.id)
</script>

<template>
  <main v-if="user?.isSubscribe && model" class="!w-full !p-0 !-mt-0">
    <div class="bg-[#313848] -mt-1 relative" v-if="model.path_cdn">
      <div class="2xl:w-page mx-auto xl:w-[1300px] relative group">
        <HdVideoPlayer :url="model.path_cdn" />
        <!-- <HdVideoPlayer url="/assets/houdunren.mp4" /> -->
        <icon-arrow-circle-left
          theme="filled"
          size="50"
          fill="#e17055"
          class="absolute left-5 top-1/2 -translate-y-1/2 hidden xl:group-hover:block"
          @click="preVideo ? open({ name: 'video.show', params: { id: preVideo?.id } }) : null"
          :class="
            preVideo
              ? 'cursor-pointer duration-200 hover:scale-125 opacity-70 hover:opacity-90'
              : 'opacity-0 text-gray-100'
          " />
        <icon-arrow-circle-right
          theme="filled"
          size="50"
          fill="#e17055"
          class="absolute right-5 top-1/2 -translate-y-1/2 hidden xl:group-hover:block"
          @click="nextVideo ? open({ name: 'video.show', params: { id: nextVideo?.id } }) : null"
          :class="
            nextVideo
              ? 'cursor-pointer duration-200 hover:scale-125 opacity-70 hover:opacity-90'
              : 'opacity-0 text-gray-100'
          " />
      </div>
    </div>
    <!-- <div v-else class="bg h-[300px] py-10 box-content shadow-2xl flex flex-col">
      <h1 class="text-center p-10 text-5xl md:text-8xl font-semibold text-white">投资学习是值得的</h1>
      <h2 class="text-center text-white opacity-80 font-light text-2xl">订阅后可以观看网站所有教程</h2>

      <div class="text-center mt-5">
        <el-button type="success" size="large" @click="$router.push({ name: 'subscribe' })"> 马上订阅 </el-button>
      </div>
    </div> -->
    <div class="2xl:w-page 2xl:mx-auto mt-3 rounded-lg bg-white p-3 mx-2">
      <div class="flex flex-col lg:flex-row justify-between items-start text-sm">
        <div class="flex flex-col">
          <h1 class="font-bold text-lg mb-3 text-gray-700 opacity-90">{{ model.title }}</h1>
          <div class="flex items-center text-gray-500 mb-2 xl:mb-0">
            <el-tag type="warning" size="small" effect="plain" class="mr-2">课程</el-tag>
            <router-link
              :to="{ name: 'system.show', params: { id: model?.lesson.system_id } }"
              v-if="model?.lesson?.system">
              {{ model?.lesson?.system.title }}
            </router-link>
            <div class="flex items-center" v-if="model?.lesson?.system">
              <icon-right theme="outline" />
            </div>
            <router-link :to="{ name: 'lesson.show', params: { id: model?.lesson_id } }">
              {{ model?.lesson.title }}
            </router-link>
          </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2">
          <div class="flex gap-2">
            <!-- 章节课程列表 -->
            <SystemLessonDropdown :lessons="model.lesson.system?.lessons" v-if="model.lesson.system?.lessons?.length" />
            <!-- 下载视频 -->
            <DownloadLesson :id="model?.lesson.id" type="lesson" size="small" />
            <!-- 收藏  -->
            <Favorite model="Video" :id="model.id" size="small" />
          </div>

          <div class="flex gap-2">
            <div @click="open({ name: 'video.show', params: { id: preVideo?.id } })" v-if="preVideo">
              <el-button :type="preVideo ? 'success' : 'info'" size="small"> 上一集 </el-button>
            </div>
            <div @click="open({ name: 'video.show', params: { id: nextVideo?.id } })" v-if="nextVideo">
              <el-button :type="nextVideo ? 'success' : 'info'" size="small"> 下一集 </el-button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="2xl:w-page 2xl:mx-auto pt-3 lg:grid grid-flow-row items-start lg:grid-cols-12 gap-2 mx-2">
      <LessonVideoList :lessonId="model.lesson_id" :videos="model.lesson.videos" class="lg:col-span-4 md:m-0" />
      <CommentList model="Video" :id="model.id" class="lg:col-span-8 rounded-xl lg:m-0 mt-3" />
    </section>
  </main>
</template>

<style lang="scss" scoped>
.bg {
  background: linear-gradient(150deg, #2d1582, #19a0ff);
}
</style>
