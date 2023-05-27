<script setup lang="ts">
const route = useRoute()
const { userVideos } = useLearnHistory()
const videos = ref<ApiPage<VideoModel>>()

userVideos(route.query.uid, route.query.page || 1).then((res) => (videos.value = res))
</script>

<template>
  <main v-if="videos">
    <div class="bg-white shadow-sm rounded-xl border px-5">
      <div v-if="videos?.data.length">
        <VideoItem v-for="video of videos.data" :key="video.id" :video="video" :showTime="false">
          <template #title="props">
            {{ props.video.title.replace(/^\d+\s*/, '') }}
          </template>
        </VideoItem>
      </div>
      <div class="text-center py-5" v-else>这是新朋友 ，TA还没有开始学习</div>
    </div>

    <Pagination
      :per_page="videos.meta.per_page"
      :total="videos.meta.total"
      @current-change="$router.push({ name: 'video.space', query: { uid: $route.query.uid, page: $event } })" />
  </main>
</template>
