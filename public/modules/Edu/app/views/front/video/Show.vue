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
          <div class="col-12 col-md-7">
            <h5 class="text-secondary">{{ field.title }}</h5>
            <router-link
              :to="{ name: 'lesson.show', params: { id: lesson.id } }"
              class="text-secondary font-weight-light"
            >
              <i class="fa fa-folder-o" aria-hidden="true"></i>
              {{ lesson.title }}
            </router-link>
          </div>
          <div
            class="col-12 col-md-5 mt-2 mt-md-0 d-flex justify-content-md-end justify-content-start flex-wrap"
          >
            <div class="btn-group btn-group-sm align-items-center mr-1">
              <button
                class="btn btn-outline-success"
                type="button"
                aria-label
                v-if="prev"
                @click.prevent="load(prev.id)"
              >上集</button>
              <button
                class="btn btn-outline-success"
                type="button"
                aria-label
                v-if="next"
                @click.prevent="load(next.id)"
              >下集</button>
              <button class="btn btn-outline-success" type="button" aria-label>下载高清版</button>
            </div>
            <div class="btn-group btn-group-sm align-items-center mt-1 mt-md-0">
              <button
                class="btn btn-outline-secondary"
                :class="{ 'btn-outline-info': field.is_favorite }"
                type="button"
                aria-label
                @click.prevent="favorite"
              >
                <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏
              </button>
              <button
                class="btn btn-outline-secondary"
                :class="{ 'btn-outline-info': field.is_favorite }"
                type="button"
                aria-label
              >{{ field.favorite_count }}</button>
              <button
                class="btn btn-outline-secondary"
                :class="{ 'btn-outline-danger': field.is_favour }"
                type="button"
                aria-label
                @click.prevent="favour"
              >
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 点赞
              </button>
              <button
                class="btn btn-outline-secondary"
                :class="{ 'btn-outline-danger': field.is_favour }"
                type="button"
                aria-label
              >{{ field.favour_count }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row">
        <div class="col-md-9 order-1 mt-2 mt-md-0 order-md-0">
          <comment
            height="300px"
            :action="`edu/front/video/comment/${field.id}`"
            :comments="comments"
          />
        </div>
        <div class="col-md-3 pl-md-0 order-0 order-md-1">
          <div class="card text-secondary">
            <div class="card-header bg-white">课程列表</div>
            <ul class="list-group list-group-flush">
              <router-link
                :to="{ name: 'video.show', params: { id: video.id } }"
                class="list-group-item text-secondary"
                v-for="video in lesson.videos"
                :key="video.id"
              >{{ video.title }}</router-link>
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
import Comment from '../components/Comment'
export default {
  components: {
    VideoPlay,
    Footers,
    Comment
  },
  beforeRouteUpdate(to, from, next) {
    this.load(to.params.id)
    next()
  },
  data() {
    return {
      field: {},
      lesson: {},
      comments: []
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
        await this.axios.get(`edu/front/video/${this.$route.params.id}`).then(r => r.data),
        await this.axios.get(`edu/front/video/comment/${this.$route.params.id}`).then(r => r.data)
      ])
      this.$set(this, 'lesson', response[0])
      this.$set(this, 'field', response[1])
      this.$set(this, 'comments', response[2])
    },
    async favour() {
      let response = await this.axios.get(`edu/front/video/favour/${this.field.id}`)
      this.$set(this, 'field', response.data)
    },
    async favorite() {
      let response = await this.axios.get(`edu/front/video/favorite/${this.field.id}`)
      this.$set(this, 'field', response.data)
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
