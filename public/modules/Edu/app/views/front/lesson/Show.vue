<template>
  <div v-if="field">
    <div class="container mt-3 mt-md-5 mb-5" v-if="field">
      <div class="row">
        <div class="col-12 col-md-9">
          <div class="card">
            <div class="card-body p-5">
              <h4 class="text-black-50 mb-4">{{ field.title }}</h4>
              <div class="btn-group btn-group-sm" role="group" aria-label>
                <button type="button" class="btn btn-outline-secondary">
                  <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏
                </button>
                <button type="button" class="btn btn-outline-secondary">12</button>
              </div>
              <div class="btn-group btn-group-sm" role="group" aria-label>
                <button type="button" class="btn btn-outline-success">
                  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 点赞
                </button>
                <button type="button" class="btn btn-outline-success">12</button>
              </div>

              <!-- 视频列表 -->
              <ul class="list-group list-group-flush mt-5">
                <li
                  class="list-group-item pl-0 mb-1 pb-3"
                  v-for="video in field.videos"
                  :key="video.id"
                >
                  <router-link
                    :to="{ name: 'video.show', params: { sid: field.id, id: video.id } }"
                    class="text-muted"
                  >{{ video.title }}</router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-3 pl-0">
          <tips />
        </div>
      </div>
    </div>
    <footers />
  </div>
</template>

<script>
import Tips from '../components/Tips'
import Footers from '../components/Footer'

export default {
  components: { Tips, Footers },
  data() {
    return {
      field: null
    }
  },
  async created() {
    let response = await this.axios.get(`edu/front/lesson/${this.$route.params.id}`)
    this.$set(this, 'field', response.data)
  },
  methods: {}
}
</script>

<style></style>
