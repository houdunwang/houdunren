<template>
  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-12 col-md-9">
        <div class="card">
          <div class="card-header bg-white justify-content-between">话题讨论</div>
          <div class="card-body pb-0 pt-2">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" ref="searchInput" @keyup.enter="search" />
              <div class="input-group-append">
                <a href="#" type="button" class="btn btn-outline-secondary" @click.prevent="search">搜索</a>
                <router-link :to="{ name: 'topic.create' }" class="btn btn-outline-secondary">发表</router-link>
              </div>
            </div>
          </div>
          <div class="card-body" v-if="!topics">
            <div class="d-flex pt-3 pb-3 border-top" v-for="k in 10" :key="k">
              <a-skeleton avatar active :paragraph="{ rows: 1 }" />
            </div>
          </div>
          <div class="card-body" v-if="topics">
            <div class="d-flex pt-3 pb-3 border-top" v-for="topic in topics.data" :key="topic.id">
              <avatar :src="topic.user.avatar" class="mr-3" />
              <div class="d-flex flex-column justify-content-between">
                <router-link :to="{ name: 'topic.show', params: { id: topic.id } }" class="text-secondary">{{
                  topic.title
                }}</router-link>
                <span class="small text-black-50">
                  {{ topic.user.name }} . 发表于{{ topic.created_at | dateFormat('now') }} .
                  {{ topic.comment_count }}条评论
                </span>
              </div>
            </div>
            <div class="mt-2">
              <a-pagination
                v-model="topics.meta.current_page"
                :total="topics.meta.total"
                showLessItems
                @change="load"
                :hideOnSinglePage="true"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-3 p-0">
        <tips />
      </div>
    </div>
  </div>
</template>

<script>
import Tips from '../components/Tips'
import Avatar from '../components/Avatar'
export default {
  components: { Tips, Avatar },
  data() {
    return {
      topics: null,
      keyword: ''
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async currentChange(page) {
      await this.load(page)
    },
    async load(page = 1) {
      let response = await this.axios.post(`edu/front/topic/search?page=${page}`, {
        keyword: this.keyword
      })
      this.$set(this, 'topics', response.data)
    },
    async search(e) {
      this.keyword = this.$refs['searchInput'].value
      this.$refs['searchInput'].value = ''
      this.load(1)
    }
  }
}
</script>

<style lang="scss" scoped></style>
