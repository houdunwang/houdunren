<template>
  <div class="container">
    <a-tabs>
      <a-tab-pane key="1" tab="视频收藏"></a-tab-pane>
    </a-tabs>
    <div v-if="videos">
      <ul class="list-group list-group-flush" v-if="videos">
        <li class="list-group-item pl-0 " v-for="video in videos.data" :key="video.id">
          <router-link :to="{ name: 'video.show', params: { sid: video.lesson_id, id: video.id } }">
            {{ video.title }}
          </router-link>
        </li>
      </ul>
    </div>
    <div class="mt-1" v-if="videos">
      <a-pagination v-model="videos.meta.current_page" :total="videos.meta.total" showLessItems @change="load" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      videos: null
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load(page = 1) {
      let response = await this.axios.get(`edu/member/video?page=${page}`)
      this.$set(this, 'videos', response.data)
    }
  }
}
</script>

<style></style>
