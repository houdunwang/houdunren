<template>
  <div>
    <nav class="nav nav-tabs">
      <router-link :to="{ name: 'site' }" class="nav-link">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">站点模块列表</a>
    </nav>
    <div class="card mt-3 shadow-sm">
      <div class="card-body">
        <div class="row mt-3">
          <div class="col-3" v-for="module in modules" :key="module.model.id">
            <div class="p-3 align-middle border shadow-sm">
              <img :src="module.package.thumb" class="rounded-circle mr-3" />
              <span>{{ module.package.title }}</span>
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
      modules: []
    }
  },
  async created() {
    let response = await this.axios.get(`site/${this.$route.params.sid}/module`).then(r => r.data.data)

    this.$set(this, 'modules', response)
  },
  methods: {}
}
</script>

<style lang="scss" scoped>
img {
  width: 50px;
}
</style>
