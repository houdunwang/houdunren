<template>
  <div class="container mt-5" v-if="field">
    <div class="row">
      <div class="col-12 col-md-9">
        <div class="card">
          <div class="card-header bg-white justify-content-between">话题讨论</div>
          <div class="card-body pb-0 pt-2">
            <div class="input-group input-group-sm">
              <input type="text" class="form-control" ref="searchInput" @keyup.enter="search" />
              <div class="input-group-append">
                <a
                  href="#"
                  type="button"
                  class="btn btn-outline-secondary"
                  @click.prevent="search"
                >搜索</a>
                <router-link :to="{name:'topic.create'}" class="btn btn-outline-secondary">发表</router-link>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex pt-3 pb-3 border-top" v-for="topic in field.data" :key="topic.id">
              <avatar src="http://localhost:3000/images/member-login.jpg" class="mr-3" />
              <div class="d-flex flex-column justify-content-between">
                <router-link
                  :to="{name:'topic.show',params:{id:topic.id}}"
                  class="text-secondary"
                >{{ topic.title }}</router-link>
                <span class="small text-black-50">
                  {{ topic.user.nickname }} .
                  发表于{{ topic.created_at | dateFormat('now')}} . 0条评论
                </span>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">
            <el-pagination
              @current-change="currentChange"
              :page-size="15"
              :total="field.meta.total"
              background
            ></el-pagination>
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
      field: null,
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
      this.$set(this, 'field', response.data)
    },
    async search(e) {
      this.keyword = this.$refs['searchInput'].value
      this.$refs['searchInput'].value = ''
      this.load(1)
    }
  }
}
</script>


<style lang="scss" scoped>
</style>
