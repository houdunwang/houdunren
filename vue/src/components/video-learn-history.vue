<script setup lang="ts">
//用户视频学习历史
const userStore = useUserStore()
const { userVideos } = useLearnHistory()
const videos = ref<VideoModel[]>()
if (userStore.user?.id) {
  const { data } = await userVideos(userStore.user?.id)
  videos.value = data
}
</script>

<template>
  <main class="fixed right-5 bottom-40 cursor-pointer z-20" v-if="videos && videos.length">
    <el-dropdown trigger="click">
      <icon-play-two theme="filled" size="40" fill="#c44569" />
      <template #dropdown>
        <el-dropdown-menu>
          <el-dropdown-item v-for="(video, index) of videos" :key="video.id">
            <router-link :to="{ name: 'video.show', params: { id: video.id } }" target="_self">
              {{ video.title.replace(/^\d+\s*/, '') }}
            </router-link>
          </el-dropdown-item>
        </el-dropdown-menu>
      </template>
    </el-dropdown>
  </main>
</template>
