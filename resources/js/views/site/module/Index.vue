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
            <div class="card">
              <div class="card-body pt-3 pb-3 align-middle rounded d-flex justify-content-center">
                <a
                  :href="moduleLink(module)"
                  class="d-flex flex-column justify-content-center align-items-center"
                >
                  <img :src="module.config.preview" class="rounded-circle mb-2" />
                  <span class="text-muted">{{ module.config.title }}</span>
                </a>
              </div>
              <div class="card-footer text-muted d-flex justify-content-center">
                <div class="btn-group btn-group-sm">
                  <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <button
                      type="button"
                      class="btn"
                      :class="site.module_id==module.model.id?'btn-info':'btn-outline-info'"
                      @click.prevent="setDefaultModule(module.model.id)"
                    >默认模块</button>
                    <a :href="moduleLink(module)" class="btn btn-outline-success">管理模块</a>
                  </div>
                </div>
              </div>
            </div>
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
      site: {},
      modules: [],
      loadMessage: '模块加载中...'
    }
  },
  async created() {
    let response = await Promise.all([
      this.axios.get(`site/site/${this.$route.params.sid}`),
      this.axios.get(`site/${this.$route.params.sid}/module/user`)
    ])

    this.$set(this, 'site', response[0].data.data)
    this.$set(this, 'modules', response[1].data.data)
    this.loadMessage = response.length ? '' : '暂无可用模块'
  },
  methods: {
    moduleLink(module) {
      const name = module.config.name.toLowerCase()
      return `/${name}/admin?sid=${this.$route.params.sid}`
    },
    async setDefaultModule(mid) {
      await this.axios.get(`site/site/${this.$route.params.sid}/${mid}`)
      this.$set(this.site, 'module_id', mid)
      this.$message.success('默认模块设置成功')
    }
  }
}
</script>

<style lang="scss" scoped>
img {
  width: 50px;
}
</style>
