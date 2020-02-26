<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">权限设置</a>
    </nav>
    <div class="card mt-2" v-for="(permissions,moduleName) in permissions" :key="moduleName">
      <div class="card-header">{{ moduleName }}</div>
      <div class="card-body">
        <el-checkbox-group v-model="access">
          <div class="row">
            <div class="col-4 col-md-2" v-for="permission in permissions" :key="permission.id">
              <el-checkbox :label="permission.id">{{ permission.title }}</el-checkbox>
            </div>
          </div>
        </el-checkbox-group>
      </div>
    </div>
    <button class="btn btn-primary mt-3" @click="submit">保存权限</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      permissions: [],
      //用户拥有的权限
      access: []
    }
  },
  async created() {
    const params = this.$route.params
    let response = await Promise.all([
      this.axios.get(`site/${params.sid}/permission`).then(r => r.data.data),
      this.axios.get(`site/${params.sid}/access/${params.uid}`).then(r => r.data.data)
    ])
    this.$set(this, 'permissions', response[0])
    this.$set(
      this,
      'access',
      response[1].map(access => access.id)
    )
  },
  methods: {
    async submit() {
      let params = this.$route.params
      await this.axios.put(`site/${params.sid}/access/${params.uid}`, {
        access: this.access
      })
      this.$message.success('权限更新成功')
    }
  }
}
</script>

<style lang="scss" scoped></style>
