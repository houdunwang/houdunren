<template>
  <master>
    <a-table
      size="middle"
      bordered
      :dataSource="groups"
      :columns="columns"
      rowKey="id"
      :pagination="false"
    >
      <div slot="package" slot-scope="g">
        <span class="badge badge-info mr-1" v-for="p in g.packages" :key="p.id">{{ p.name }}</span>
      </div>
      <div slot="manage" slot-scope="group">
        <div class="btn-group btn-group-sm">
          <router-link
            :to="{name:'system.group.edit',params:{id:group.id}}"
            class="btn btn-outline-secondary"
            type="button"
            aria-label
          >编辑</router-link>
          <button type="button" @click="del(group)" class="btn btn-outline-danger">删除</button>
        </div>
      </div>
    </a-table>
  </master>
</template>

<script>
import Master from './layouts/Master'
const columns = [
  { title: '编号', dataIndex: 'id', key: 'id' },
  { title: '会员组', dataIndex: 'name', key: 'name' },
  { title: '站点数量', dataIndex: 'site_num', key: 'site_num' },
  { title: '拥有套餐', scopedSlots: { customRender: 'package' } },
  { title: '操作', width: 120, scopedSlots: { customRender: 'manage' } }
]
export default {
  components: { Master },
  data() {
    return {
      groups: [],
      columns,
      tableMessage: '加载中...'
    }
  },
  created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`system/group`)
      this.$set(this, 'groups', response.data)
    },
    async del(group) {
      this.$confirm({
        content: '确定删除吗？',
        onOk: () => {
          return this.axios.delete(`system/group/${group.id}`).then(() => {
            this.load()
            this.$message.success('删除成功')
          })
        }
      })
    }
  }
}
</script>

<style scoped>
img {
  max-width: 100%;
  border: solid 1px #ddd;
}
</style>
