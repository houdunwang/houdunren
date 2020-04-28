<template>
  <div>
    <nav class="nav nav-tabs">
      <router-link class="nav-link" :to="{name:'system'}">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">更新缓存</a>
    </nav>

    <div class="mt-3 mb-3">
      <a-alert message="刷新所有站点的模块权限"></a-alert>
    </div>
    <a-button type @click="updateCache">执行更新</a-button>
  </div>
</template>

<script>
export default {
  methods: {
    async updateCache() {
      await this.axios.get('system/cache')
      this.$message.success('缓存更新成功')
    }
  }
}
</script>

<style>
</style>
