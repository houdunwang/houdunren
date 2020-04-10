<template>
  <div>
    <div class="mb-3 mb-2">
      <a-input-search
        placeholder="请输入用户名、手机号或用户编号进行搜索"
        v-model="searchWord"
        @search="get"
        enterButton
      />
    </div>
    <a-table
      :dataSource="users"
      size="middle"
      bordered
      rowKey="id"
      :pagination="false"
      :columns="columns"
      :rowSelection="{selectedRowKeys: selectedRowKeys, onChange: onSelectChange}"
    >
      <div slot="avatar" slot-scope="user">
        <a-avatar size="small" :src="user.avatar"></a-avatar>
      </div>
      <div slot="created_at" slot-scope="user">{{ user.created_at |dateFormat('now') }}</div>
    </a-table>
    <!-- <el-table
        size="small"
        :data="users"
        ref="multipleTable"
        @selection-change="handleSelectionChange"
        tooltip-effect="dark"
      >
        <el-table-column type="selection" width="50"></el-table-column>
        <el-table-column prop="id" label="编号" width="60"></el-table-column>
        <el-table-column prop="name" label="昵称"></el-table-column>
        <el-table-column prop="email" label="邮箱" width="180"></el-table-column>
        <el-table-column prop="mobile" label="手机号"></el-table-column>
        <el-table-column prop="group.name" label="会员组" width="70"></el-table-column>
    </el-table>-->
    <div class="mt-3 text-right">
      <button @click="$emit('cancel')" class="btn btn-secondary btn-sm" type="button">取消</button>
      <button
        @click="$emit('confirm', selectedRowKeys)"
        class="btn btn-primary btn-sm mr-1"
        type="button"
      >确定</button>
    </div>
  </div>
</template>

<script>
const columns = [
  { title: '编号', dataIndex: 'id', key: 'id' },
  { title: '头像', scopedSlots: { customRender: 'avatar' } },
  { title: '用户名', dataIndex: 'name', key: 'name' },
  { title: '邮箱', dataIndex: 'email', key: 'email' },
  { title: '手机号', dataIndex: 'phone', key: 'phone' },
  { title: '注册时间', scopedSlots: { customRender: 'created_at' } }
]
export default {
  props: {
    action: String,
    confirm: Function,
    cancel: Function
  },
  data() {
    return {
      searchWord: '',
      users: [],
      selectedRowKeys: [],
      columns
    }
  },
  created() {
    this.get()
  },
  methods: {
    async get() {
      let response = await this.axios.post(this.action, {
        content: this.searchWord
      })
      this.$set(this, 'users', response.data)
    },
    onSelectChange(selectedRowKeys) {
      this.selectedRowKeys = selectedRowKeys
    }
  }
}
</script>

<style></style>
