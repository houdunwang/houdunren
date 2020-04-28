<template>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12 col-md-9">
        <div class="card">
          <div class="card-header bg-white">最近更新</div>
          <div class="card-body" v-if="!videos">
            <ul class="list-group list-group-flush">
              <li class="list-group-item pl-0 mb-2 pb-2" v-for="k in 8" :key="k">
                <a-skeleton active :title="false" :paragraph="{ rows: 2, width: '100%' }" />
              </li>
            </ul>
          </div>
          <div class="card-body" v-if="videos">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item pl-0 d-flex justify-content-between"
                v-for="video in videos.data"
                :key="video.id"
              >
                <router-link
                  :to="{ name: 'video.show', params: { sid: video.lesson_id, id: video.id } }"
                >{{ video.title }}</router-link>
                <span class="small text-secondary">{{ video.updated_at | dateFormat }}</span>
              </li>
            </ul>
            <div class="mt-2">
              <a-pagination
                v-model="videos.meta.current_page"
                :total="videos.meta.total"
                showLessItems
                @change="load"
                :hideOnSinglePage="true"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3 pl-md-0">
        <tips />
      </div>
    </div>
  </div>
</template>

<script>
import Tips from '../components/Tips'
export default {
  components: { Tips },
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
      let response = await this.axios.get(`edu/front/video?page=${page}`)
      this.$set(this, 'videos', response.data)
    },
    currentChange(page) {
      this.load(page)
    }
  }
}
</script>
<style lang="scss" scoped></style>
