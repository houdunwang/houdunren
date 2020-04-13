<template>
  <div>
    <nav class="nav nav-tabs mb-3">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">操作员管理</a>
    </nav>

    <div class="alert alert-info" role="alert">操作员不允许删除公众号和编辑公众号资料， 只能对站点模块进行管理</div>
    <a-table
      :dataSource="users"
      :pagination="false"
      bordered
      :columns="columns"
      rowKey="id"
      size="middle"
      :rowSelection="{ selectedRowKeys: selectedRowKeys, onChange: onSelectChange }"
    >
      <div slot="avatar" slot-scope="user">
        <a-avatar :src="user.avatar" />
      </div>
      <div slot="created_at" slot-scope="user">{{ user.created_at | dateFormat('now') }}</div>
      <div slot="manage" slot-scope="user">
        <div class="btn-group btn-group-sm">
          <router-link
            :to="{ name: 'site.access', params: { uid: user.id, sid: $route.params.sid } }"
            class="btn btn-outline-success"
          >设置权限</router-link>
          <button @click="delOperator(user)" class="btn btn-outline-info" type="button">删除操作员</button>
        </div>
      </div>
    </a-table>

    <div class="mt-3">
      <button @click="showSelectUserModel = true" class="btn btn-sm btn-success">设置操作员</button>
      <button @click.prevent="removeAllOperator" class="btn btn-sm btn-danger">批量删除操作员</button>
    </div>
    <a-modal title="选择用户" v-model="showSelectUserModel" :footer="null" width="80%">
      <user-component :action="`site/${this.$route.params.sid}/admin/search`" method="post">
        <template v-slot:manage="{ user }">
          <div class="d-flex justify-content-end">
            <button
              @click.prevent="setOperator([user.id])"
              class="btn btn-sm btn-outline-info"
            >设置操作员</button>
          </div>
        </template>
        <template v-slot:batch="{ ids }">
          <div class="mt-3">
            <button
              @click="showSelectUserModel = false"
              class="btn btn-secondary btn-sm"
              type="button"
            >取消</button>
            <button @click="setOperator(ids)" class="btn btn-primary btn-sm mr-1" type="button">批量设置</button>
          </div>
        </template>
      </user-component>
    </a-modal>
  </div>
</template>

<script>
import UserComponent from '@/components/User'
const columns = [
  { title: '编号', width: 80, dataIndex: 'id', key: 'id' },
  { title: '头像', width: 80, scopedSlots: { customRender: 'avatar' } },
  { title: '用户名', dataIndex: 'name', key: 'name' },
  { title: '电话', dataIndex: 'phone', key: 'phone' },
  { title: '邮箱', dataIndex: 'email', key: 'email' },
  { title: '注册时间', width: 80, scopedSlots: { customRender: 'created_at' } },
  { title: '', width: 160, scopedSlots: { customRender: 'manage' } }
]
export default {
  components: { UserComponent },
  data() {
    return {
      users: [],
      columns,
      selectedRowKeys: [],
      showSelectUserModel: false
    }
  },
  async created() {
    this.load()
  },
  methods: {
    //加载操作员
    async load() {
      let response = await this.axios.get(`site/${this.$route.params.sid}/admin`)
      this.$set(this, 'users', response.data)
    },
    //多选择用户
    onSelectChange(selectedRowKeys) {
      this.$set(this, 'selectedRowKeys', selectedRowKeys)
    },
    //删除操作员
    delOperator(user) {
      this.$confirm({
        content: `确定删除操作员吗？`,
        onOk: async () => {
          await this.axios.delete(`site/${this.$route.params.sid}/admin`, { data: { users: [user.id] } })
          this.$message.success('操作员删除成功')
          this.load()
        }
      })
    },
    //批量删除操作员
    async removeAllOperator() {
      if (this.selectedRowKeys.length == 0) {
        this.$message.warning({ content: '你没有选择任何操作员' })
      } else {
        await this.axios.delete(`site/${this.$route.params.sid}/admin`, { data: { users: this.selectedRowKeys } })
        this.$message.success('操作员删除成功')
        this.load()
      }
    },
    //设置操作员
    async setOperator(users) {
      if (users.length == 0) {
        this.$message.warning('请选择操作员')
      } else {
        await this.axios.post(`site/${this.$route.params.sid}/admin`, {
          users
        })
        this.showSelectUserModel = false
        this.load()
      }
    },
    //关闭用户选择模态框
    closeUserModal() {
      this.showSelectUserModel = false
    }
  }
}
</script>
<style scoped></style>
