<template>
  <div>
    <div class="container mt-3 mt-md-5 mb-5">
      <div class="row">
        <div class="col-12 col-md-9">
          <div class="card">
            <div class="card-body p-5" v-if="!field">
              <a-skeleton active v-for="k in 5" :key="k" />
            </div>
            <div class="card-body p-5" v-if="field">
              <h4 class="text-black-50 mb-4">{{ field.title }}</h4>
              <div class="btn-group btn-group-sm" role="group" aria-label>
                <button
                  type="button"
                  class="btn"
                  @click.prevent="favorite"
                  :class="{ 'btn-info': field.is_favorite, 'btn-outline-secondary': !field.is_favorite }"
                >
                  <i class="fa fa-heart-o" aria-hidden="true"></i> 收藏
                </button>
                <button
                  type="button"
                  class="btn btn-outline-secondary"
                >{{ field.favorite_count ? field.favorite_count : 0 }}</button>
              </div>
              <div class="btn-group btn-group-sm" role="group" aria-label>
                <button
                  type="button"
                  class="btn"
                  @click.prevent="favour"
                  :class="{ 'btn-success': field.is_favour, 'btn-outline-secondary': !field.is_favour }"
                >
                  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 点赞
                </button>
                <button
                  type="button"
                  class="btn btn-outline-success"
                >{{ field.favour_count ? field.favour_count : 0 }}</button>
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
  </div>
</template>

<script>
import Tips from '../components/Tips'
import { mapGetters } from 'vuex'

export default {
  components: { Tips },
  data() {
    return {
      field: null
    }
  },
  async created() {
    this.load()
  },
  computed: {
    ...mapGetters('user', ['isLogin'])
  },
  methods: {
    async load() {
      let response = await this.axios.get(`edu/front/lesson/${this.$route.params.id}`)
      this.$set(this, 'field', response.data)
    },
    async favour() {
      if (!this.isLogin) {
        return this.$message.warning('请登录后操作')
      }
      let response = await this.axios.get(`edu/front/lesson/favour/${this.field.id}`)
      this.$set(this, 'field', response.data)
    },
    async favorite() {
      if (!this.isLogin) {
        return this.$message.warning('请登录后操作')
      }
      let response = await this.axios.get(`edu/front/lesson/favorite/${this.field.id}`)
      this.$set(this, 'field', response.data)
    }
  }
}
</script>

<style></style>
