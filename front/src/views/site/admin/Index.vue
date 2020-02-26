<template>
  <div>
    <nav class="nav nav-tabs mb-3">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">操作员管理</a>
    </nav>

    <el-alert
      class="mb-3"
      title=" 操作员不允许删除公众号和编辑公众号资料"
      show-icon
      type="info"
      :closable="true"
    ></el-alert>

    <div class="card shadow-sm rounded-0">
      <div class="card-body">
        <el-table
          size="small"
          :data="users"
          ref="multipleTable"
          @selection-change="handleSelectionChange"
          tooltip-effect="dark"
          :empty-text="loadMessage"
        >
          <el-table-column type="selection" width="60"></el-table-column>
          <el-table-column prop="id" label="编号" width="60"></el-table-column>
          <el-table-column prop="name" label="昵称"></el-table-column>
          <el-table-column prop="real_name" label="真实姓名"></el-table-column>
          <el-table-column prop="email" label="邮箱" min-width="180"></el-table-column>
          <el-table-column prop="mobile" label="手机号" width="150"></el-table-column>
          <el-table-column prop="group.name" label="会员组"></el-table-column>
          <el-table-column label="注册时间">
            <template slot-scope="scope">{{ scope.row.created_at | dateFormat }}</template>
          </el-table-column>

          <el-table-column aligh="right" fixed="right" width="200">
            <template slot-scope="scope">
              <el-button-group>
                <el-button
                  size="mini"
                  @click="$router.push({ name: 'site.access', params: { uid: scope.row.id, sid: $route.params.sid } })"
                  >设置权限</el-button
                >
                <el-button size="mini" @click="delOperator(scope.row)">删除操作员</el-button>
              </el-button-group>
            </template>
          </el-table-column>
        </el-table>
      </div>
      <div class="card-footer text-muted">
        <el-button size="small" @click="showSelectUserModel = true">设置操作员</el-button>
        <el-button size="small" @click="removeAllOperator">批量删除操作员</el-button>
      </div>
    </div>
    <el-dialog title="选择用户" :visible.sync="showSelectUserModel" width="60%">
      <user-component
        @confirm="setOperator"
        @cancel="closeUserModal"
        :action="`site/${this.$route.params.sid}/admin/search`"
      ></user-component>
    </el-dialog>
  </div>
</template>

<script>
import UserComponent from '@/components/User'
export default {
  components: { UserComponent },
  data() {
    return { showSelectUserModel: false, users: [], multipleSelection: [], loadMessage: '加载中...' }
  },
  async created() {
    this.loadAdmin()
  },
  methods: {
    //加载操盘员
    async loadAdmin() {
      let response = await this.axios.get(`site/${this.$route.params.sid}/admin`)
      this.users = response.data.data
      this.users.length || (this.loadMessage = ' 暂无操作员')
    },
    //多选择用户
    handleSelectionChange(val) {
      this.multipleSelection = val
    },
    //删除操作员
    async delOperator(user) {
      this.$confirm(`确定删除操作员吗？`, { type: 'warning' })
        .then(async () => {
          await this.axios.delete(`site/${this.$route.params.sid}/admin`, {
            data: { users: [user.id] }
          })
          this.loadAdmin()
        })
        .catch(() => {})
    },
    //批量删除操作员
    async removeAllOperator() {
      if (this.multipleSelection.length == 0) {
        this.$message({ message: '你没有选择任何操作员', type: 'warning' })
      } else {
        await this.axios.delete(`site/${this.$route.params.sid}/admin`, {
          data: { users: this.multipleSelection.map(u => u.id) }
        })
        this.loadAdmin()
      }
    },
    //设置操作员
    async setOperator(users) {
      await this.axios.post(`site/${this.$route.params.sid}/admin`, {
        users: users.map(u => u.id)
      })
      this.showSelectUserModel = false
      this.loadAdmin()
    },
    //子组件关闭用户选择模态框时的事件
    closeUserModal() {
      this.showSelectUserModel = false
    }
  }
}
</script>

<style scoped></style>
