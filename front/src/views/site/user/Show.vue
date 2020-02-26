<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link class="nav-link" :to="{ name: 'site.user.index', params: { sid: $route.params.sid } }"
        >用户列表</router-link
      >
      <a class="nav-link active" href="#">用户资料</a>
    </nav>
    <el-form :model="form" ref="form" label-width="80px">
      <div class="card">
        <div class="card-header">个人资料</div>
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <el-form-item label="用户名">
                <el-input v-model="form.name"></el-input>
              </el-form-item>
              <el-form-item label="邮箱">
                <el-input v-model="form.email"></el-input>
              </el-form-item>
              <el-form-item label="手机号">
                <el-input v-model="form.mobile"></el-input>
              </el-form-item>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-2">
        <div class="card-header">积分信息</div>
        <div class="card-body">
          <div class="row">
            <div class="col-8">
              <el-form-item label="credit1">
                <el-input v-model="form.credit1"></el-input>
              </el-form-item>
              <el-form-item label="credit2">
                <el-input v-model="form.credit2"></el-input>
              </el-form-item>
              <el-form-item label="credit3">
                <el-input v-model="form.credit3"></el-input>
              </el-form-item>
              <el-form-item label="credit4">
                <el-input v-model="form.credit4"></el-input>
              </el-form-item>
              <el-form-item label="credit5">
                <el-input v-model="form.credit5"></el-input>
              </el-form-item>
              <el-form-item label="credit6">
                <el-input v-model="form.credit6"></el-input>
              </el-form-item>
            </div>
          </div>
        </div>
      </div>
    </el-form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {}
    }
  },
  async created() {
    let response = await this.axios.get(`site/${this.$route.params.sid}/user/${this.$route.params.uid}`)
    this.form = response.data.data
  }
}
</script>

<style></style>
