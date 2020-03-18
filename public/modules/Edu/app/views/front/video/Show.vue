<template>
  <div class="div" v-if="field.id">
    <div class="video">
      <div class="container p-0 pl-md-3 pr-md-3">
        <video-play :path="field.path" />
      </div>
    </div>
    <div class="container mt-3 mb-2">
      <div class="card">
        <div class="card-body row">
          <div class="col-12 col-md-9">
            <h5 class="text-secondary">{{ field.title }}</h5>
            <router-link
              :to="{ name: 'lesson.show', params: { id: lesson.id } }"
              class="text-secondary font-weight-light"
            >
              <i class="fa fa-folder-o" aria-hidden="true"></i>
              {{ lesson.title }}
            </router-link>
          </div>
          <div class="col-12 col-md-3 mt-2 mt-md-0">
            <div class="d-flex flex-column">
              <div class="btn-group btn-group-sm ml-md-auto">
                <button
                  class="btn btn-outline-secondary"
                  type="button"
                  aria-label
                  v-if="prev"
                  @click.prevent="load(prev.id)"
                >
                  上集
                </button>
                <button
                  class="btn btn-outline-secondary"
                  type="button"
                  aria-label
                  v-if="next"
                  @click.prevent="load(next.id)"
                >
                  下集
                </button>
                <button class="btn btn-outline-secondary" type="button" aria-label>
                  下载高清版
                </button>
              </div>
              <div class="btn-group btn-group-sm ml-md-auto mt-1">
                <button class="btn btn-outline-secondary" type="button" aria-label>
                  <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏
                </button>
                <button class="btn btn-outline-secondary" type="button" aria-label>91</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mb-5">
      <div class="row">
        <div class="col-md-8 order-1 mt-2 mt-md-0 order-md-0">
          <div class="card">
            <div class="card-header bg-white">评论</div>
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
            </div>
            <div class="card-footer text-muted">Footer</div>
          </div>
        </div>
        <div class="col-md-4 pl-md-0 order-0 order-md-1">
          <div class="card text-secondary">
            <div class="card-header bg-white">课程列表</div>
            <ul class="list-group list-group-flush">
              <router-link
                :to="{ name: 'video.show', params: { id: video.id } }"
                class="list-group-item text-secondary"
                v-for="video in lesson.videos"
                :key="video.id"
                >{{ video.title }}</router-link
              >
            </ul>
          </div>
        </div>
      </div>
    </div>
    <footers />
  </div>
</template>

<script>
import VideoPlay from '../components/VideoPlay'
import Footers from '../components/Footer'

export default {
  components: {
    VideoPlay,
    Footers
  },
  beforeRouteUpdate(to, from, next) {
    this.load(to.params.id)
    next()
  },
  data() {
    return {
      field: {},
      lesson: {}
    }
  },
  created() {
    this.load(this.$route.params.id)
  },
  computed: {
    next() {
      let index = this.lesson.videos.findIndex(v => v.id === this.field.id)
      return this.lesson.videos[index + 1]
    },
    prev() {
      let index = this.lesson.videos.findIndex(v => v.id === this.field.id)
      return this.lesson.videos[index - 1]
    }
  },
  methods: {
    async load(id) {
      let response = await Promise.all([
        await this.axios.get(`edu/front/lesson/${this.$route.params.sid}`).then(r => r.data),
        await this.axios.get(`edu/front/video/${this.$route.params.id}`).then(r => r.data)
      ])
      this.$set(this, 'lesson', response[0])
      this.$set(this, 'field', response[1])
    }
  }
}
</script>

<style lang="scss" scoped>
.video {
  margin-top: -1px;
  background: #2b313e;
}
</style>
