<template>
  <div>
    <a-tabs type="card" defaultActiveKey="index" v-model="activeKey">
      <a-tab-pane tab="套餐列表" key="index">
        <list :key="loadList" :id.sync="id" />
      </a-tab-pane>
      <a-tab-pane tab="添加套餐" key="add">
        <add @load="load" />
      </a-tab-pane>
      <a-tab-pane tab="编辑套餐" key="edit" v-if="id">
        <edit :id.sync="id" @load="load" />
      </a-tab-pane>
    </a-tabs>
  </div>
</template>

<script>
import Add from './Add'
import List from './List'
import Edit from './Edit'
import Master from './layouts/Master'
export default {
  components: { Add, List, Edit, Master },
  data() {
    return {
      loadList: 1,
      id: 0,
      activeKey: 'index'
    }
  },
  watch: {
    id(id) {
      this.activeKey = id ? 'edit' : 'index'
    }
  },
  methods: {
    load() {
      this.loadList++
    }
  }
}
</script>

<style scoped>
</style>
