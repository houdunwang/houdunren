<template>
  <a-table
    :columns="columns"
    rowKey="id"
    :dataSource="packages"
    size="middle"
    bordered
    :pagination="false"
  >
    <div slot="modules" slot-scope="modules">
      <a-tag color="red" v-for="(m) in modules" :key="m.model.id">{{ m.model.title }}</a-tag>
    </div>
    <div slot="group" slot-scope="group">
      <a-tag color="blue" v-for="(g) in group" :key="g.id">{{ m.title }}</a-tag>
    </div>
    <div slot="manage" slot-scope="scope">
      <a-button-group>
        <a-button type="small" @click="edit(scope.id)">编辑</a-button>
        <a-button type="primary">删除</a-button>
      </a-button-group>
    </div>
  </a-table>
</template>

<script>
export default {
  props: {
    id: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      packages: [],
      columns: [
        { title: '编号', dataIndex: 'id', key: 'id' },
        { title: '套餐名称', dataIndex: 'name', key: 'name' },
        { title: '模块列表', dataIndex: 'modules', key: 'modules', scopedSlots: { customRender: 'modules' } },
        { title: '会员组', dataIndex: 'group', key: 'group', scopedSlots: { customRender: 'group' } },
        { title: '操作', width: 150, scopedSlots: { customRender: 'manage' } }
      ]
    }
  },
  async created() {
    let response = await this.axios.get(`system/package`)
    this.$set(this, 'packages', response.data.data)
  },
  methods: {
    edit(id) {
      this.$emit('update:id', id)
    }
  }
}
</script>

<style>
</style>
