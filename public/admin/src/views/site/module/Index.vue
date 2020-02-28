<template>
  <div>
    <nav class="nav nav-tabs">
      <router-link :to="{ name: 'site' }" class="nav-link">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">站点应用集</a>
    </nav>
    <div class="card mt-3 shadow-sm">
      <div class="card-body">
        <div class="row mt-3">
          <div class="col-12 text-center m-2" v-if="loadMessage">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            {{ loadMessage }}
          </div>
          <div class="col-12 col-md-3 mb-2" v-for="module in modules" :key="module.model.id">
            <router-link :to="{ name: 'module', params: { sid: $route.params.sid, mid: module.model.id } }">
              <div class="p-3 align-middle border shadow-sm">
                <img :src="module.config.preview" class="rounded-circle mr-3" />
                <span>{{ module.config.title }}</span>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      modules: [],
      loadMessage: '模块加载中...'
    }
  },
  async created() {
    let response = await this.axios.get(`site/${this.$route.params.sid}/module`).then(r => r.data.data)

    this.$set(this, 'modules', response)
    this.loadMessage = response.length ? '' : '暂无可用模块'
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
img {
  width: 50px;
}
</style>
