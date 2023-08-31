<script setup lang="ts">
import dayjs from 'dayjs'
const { lessonId, videos, showLastVideo } = withDefaults(
  defineProps<{
    lessonId: string | number
    videos: VideoModel[]
    showLastVideo?: boolean
    target?: '_blank' | '_self'
  }>(),
  { showLastVideo: true, target: '_blank' },
)
const { lessonVideo } = useLearnHistory()
const { isLogin } = useAuth()
const learnVideos = ref<VideoModel[]>([])
const video = (video: VideoModel) => learnVideos.value?.find((v: any) => v.id == video.id)
//最近学习的那个视频
const lastVideo = computed(() => {
  return learnVideos.value.sort(
    (a: VideoModel, b: VideoModel) => dayjs(b.pivot.updated_at).unix() - dayjs(a.pivot.updated_at).unix(),
  )[0]
})
if (isLogin()) {
  learnVideos.value = await lessonVideo(lessonId)
}
</script>
<template>
  <main>
    <HdCard v-if="videos.length">
      <template #header>
        <div class="md:flex gap-2 flex-col">
          <div class="flex items-baseline justify-between">
            <div class="">视频列表</div>
            <div class="text-xs" v-if="showLastVideo && lastVideo">
              最近学习了
              <router-link :to="{ name: 'video.show', params: { id: lastVideo.id } }" class="font-bold text-[#16a085]">
                {{ lastVideo.title }}
              </router-link>
            </div>
          </div>

          <section class="text-xs bg-slate-100 py-2 rounded-sm px-3 md:flex items-center justify-between">
            <div class="">
              <div v-if="learnVideos?.length == videos?.length">已学完</div>
              <div v-else class="">
                <div class="flex items-center">
                  还有 {{ videos?.length - learnVideos?.length }} 课就学完了，加油少年！
                  <icon-good-two theme="filled" />
                </div>
              </div>
            </div>
          </section>
        </div>
      </template>
      <template #default>
        <section class="!-my-5">
          <router-link
            :to="{ name: 'video.show', params: { id: v.id } }"
            v-for="v of videos"
            :key="v.id"
            :target="target">
            <div class="flex py-3 border-b text-base hover:text-[#3b907f] cursor-pointer items-baseline opacity-95">
              <div
                class="flex items-center mr-2"
                :style="lastVideo?.id == v.id ? 'color:#16a085;font-weight:bold' : ''">
                <icon-play theme="outline" class="mr-2" />
                {{ v.title }}
              </div>
              <div class="flex items-center gap-2" v-if="video(v)">
                <icon-correct theme="filled" class="text-green-700 scale-90" />
                <span class="text-xs">{{ dayjs(video(v)?.pivot.created_at).fromNow() }} </span>
              </div>
            </div>
          </router-link>
        </section>
      </template>
    </HdCard>
    <div v-else class="bg-white border text-gray-500 rounded-md p-3">课程正在录制中...</div>
  </main>
</template>
