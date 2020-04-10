<template>
  <div>
    <div class="mb-3 mb-2">
      <a-input-search
        placeholder="请输入用户名、手机号或用户编号进行搜索"
        v-model="searchWord"
        @search="load"
        enterButton
      />
    </div>
    <a-table
      v-if="users.data"
      :dataSource="users.data"
      size="middle"
      bordered
      :pagination="{
        total: users.meta.total,
        current: users.meta.current_page,
        hideOnSinglePage: true
      }"
      @change="load"
      rowKey="id"
      :columns="columns"
      :rowSelection="{ selectedRowKeys: selectedRowKeys, onChange: onSelectChange }"
    >
      <div slot="avatar" slot-scope="user">
        <a-avatar size="small" :src="user.avatar"></a-avatar>
      </div>
      <div slot="created_at" slot-scope="user">{{ user.created_at | dateFormat('now') }}</div>
    </a-table>
    <div class="mt-3 text-right">
      <button @click="$emit('cancel')" class="btn btn-secondary btn-sm" type="button">取消</button>
      <button @click="$emit('confirm', selectedRowKeys)" class="btn btn-primary btn-sm mr-1" type="button">确定</button>
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
    this.load({})
  },
  methods: {
    async load({ current = 1 }) {
      let response = await this.axios.post(`${this.action}?page=${current}`, {
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
