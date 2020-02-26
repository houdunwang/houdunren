<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link class="nav-link active" :to="{ name: 'site.user', params: { sid: $route.params.sid } }">
        用户列表
      </router-link>
    </nav>
    <div class="card">
      <div class="card-body">
        <el-table size="small" :data="users" fit>
          <el-table-column prop="id" label="编号" width="60"></el-table-column>
          <el-table-column prop="name" label="昵称"></el-table-column>
          <el-table-column prop="real_name" label="真实姓名"></el-table-column>
          <el-table-column prop="email" label="邮箱" min-width="180"></el-table-column>
          <el-table-column prop="mobile" label="手机号"></el-table-column>
          <el-table-column prop="group.name" label="会员组"></el-table-column>
          <el-table-column label="注册时间">
            <template slot-scope="scope">{{ scope.row.created_at | dateFormat }}</template>
          </el-table-column>
          <el-table-column aligh="right" fixed="right" width="80">
            <template slot-scope="scope">
              <el-button-group>
                <el-button
                  size="mini"
                  @click="
                    $router.push({ name: 'site.user.show', params: { uid: scope.row.id, sid: $route.params.sid } })
                  "
                  >查看</el-button
                >
              </el-button-group>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: []
    }
  },
  async created() {
    let response = await this.axios.get(`site/${this.$route.params.sid}/user`)
    this.users = response.data.data
  }
}
</script>

<style scoped></style>
