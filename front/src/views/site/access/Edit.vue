<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">权限设置</a>
    </nav>
    <div class="card mt-2" v-for="(menus, moduleName) in menus" :key="moduleName">
      <div class="card-header">{{ moduleName }}</div>
      <div class="card-body">
        <el-checkbox-group v-model="permissions">
          <div class="row">
            <div class="col-6 col-md-2" v-for="menu in menus" :key="menu.permission">
              <el-checkbox :label="menu.permission">{{ menu.title }}</el-checkbox>
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
      menus: [],
      //用户拥有的权限
      permissions: []
    }
  },
  async created() {
    const params = this.$route.params
    let response = await Promise.all([
      this.axios.get(`site/${params.sid}/permission-menu`).then(r => r.data.data),
      this.axios.get(`site/${params.sid}/access/${params.uid}`).then(r => r.data.data)
    ])
    this.$set(this, 'menus', response[0])
    this.$set(
      this,
      'permissions',
      response[1].map(access => access.name)
    )
  },
  methods: {
    async submit() {
      let params = this.$route.params
      await this.axios.put(`site/${params.sid}/access/${params.uid}`, {
        permissions: this.permissions
      })
      this.$message.success('权限更新成功')
    }
  }
}
</script>

<style lang="scss" scoped></style>
