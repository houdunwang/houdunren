<template>
  <master>
    <a-table
      :dataSource="packages"
      :pagination="false"
      :columns="columns"
      rowKey="id"
      size="middle"
      :loading="loading"
      bordered
      :locale="{emptyText:'加载中'}"
    >
      <div slot="modules" slot-scope="scope">
        <span
          class="badge badge-info mr-1"
          v-for="m in scope.modules"
          :key="m.model.id"
        >{{ m.model.title }}</span>
      </div>
      <div slot="group" slot-scope="scope">
        <span class="badge badge-success" v-for="g in scope.group" :key="g.id">{{ g.name }}</span>
      </div>
      <div slot="manage" slot-scope="scope">
        <div class="btn-group btn-group-sm">
          <router-link
            :to="{name:'system.package.edit',params:{id:scope.id}}"
            class="btn btn-outline-info"
          >编辑</router-link>
          <button
            class="btn btn-outline-success"
            v-if="!scope.system"
            @click.prevent="del(scope)"
          >删除</button>
        </div>
      </div>
    </a-table>
  </master>
</template>
<script>
import Master from './layouts/Master'
const columns = [
  { title: '编号', dataIndex: 'id', key: 'id' },
  { title: '套餐名称', dataIndex: 'name', key: 'name' },
  { title: '模块', scopedSlots: { customRender: 'modules' } },
  { title: '会员组', scopedSlots: { customRender: 'group' } },
  { title: '操作', width: 120, scopedSlots: { customRender: 'manage' } }
]
export default {
  components: { Master },
  data() {
    return {
      packages: [],
      columns,
      loading: true
    }
  },
  async created() {
    this.load()
  },
  methods: {
    async load() {
      let response = await this.axios.get(`system/package`)
      this.$set(this, 'packages', response.data)
      this.loading = false
    },
    del(model) {
      this.$confirm({
        content: '确定删除吗?',
        onOk: () => {
          return this.axios
            .delete(`system/package/${model.id}`)
            .then(() => {
              this.$message.success('删除成功')
              this.load()
            })
            .catch(() => {})
        },
        onCancel() {}
      })
    }
  }
}
</script>

<style scoped>
</style>
