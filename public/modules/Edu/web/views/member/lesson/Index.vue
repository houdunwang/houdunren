<template>
  <div class="container">
    <a-tabs>
      <a-tab-pane key="1" tab="课程收藏"></a-tab-pane>
    </a-tabs>
    <div class="row" v-if="lessons">
      <div
        class="col-12 col-md-4 lesson mb-4 d-flex flex-column justify-content-between"
        v-for="lesson in lessons.data"
        :key="lesson.id"
      >
        <lesson :lesson="lesson" />
      </div>
    </div>
    <div class="mt-1" v-if="lessons">
      <a-pagination v-model="lessons.meta.current_page" :total="lessons.meta.total" showLessItems @change="load" />
    </div>
  </div>
</template>

<script>
import Lesson from '@/views/front/components/Lesson'

export default {
  components: { Lesson },
  data() {
    return {
      lessons: null
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load(page = 1) {
      let response = await this.axios.get(`edu/member/lesson?page=${page}`)
      this.$set(this, 'lessons', response.data)
    }
  }
}
</script>

<style></style>
