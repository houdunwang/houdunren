<template>
  <div>
    <nav class="nav nav-tabs">
      <router-link class="nav-link" :to="{name:'system'}">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">更新缓存</a>
    </nav>

    <div class="alert alert-info mt-3" role="alert">刷新所有站点的模块权限</div>
    <el-button type="success" @click="updateCache">执行更新</el-button>
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