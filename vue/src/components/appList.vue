<script setup lang="ts">
const search = ref('')

const tableData = ref([
  {
    date: '2016-05-03',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
  {
    date: '2016-05-02',
    name: 'Tom',
    address: 'No. 189, Grove St, Los Angeles',
  },
])

const columns = ref([
  { id: 'name', label: '应用名称' },
  { id: 'icon', label: '图标' },
  { id: 'created_at', label: '安装时间' },
])
</script>

<template>
  <main class="">
    <div class="flex justify-center py-3">
      <el-button type="info" size="default" round>本地模块</el-button>
      <el-button type="success" size="default" color="#626aef" round>在线模块</el-button>
    </div>

    <el-input v-model="search" placeholder="" size="large" clearable>
      <template #append>
        <el-button type="primary" size="default" @click="">搜索</el-button>
      </template>
    </el-input>

    <!-- 应用列表 -->
    <section class="mt-3">
      <el-table :data="tableData" border stripe>
        <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label"> </el-table-column>
        <el-table-column label="操作" :width="180" align="center">
          <div class="flex gap-1 btn">
            <el-button type="warning" size="small" plain @click="">卸载</el-button>
            <el-button type="success" size="small" plain @click="">管理</el-button>
            <el-button type="primary" size="small" plain @click="">访问</el-button>
          </div>
        </el-table-column>
      </el-table>
    </section>
  </main>
</template>

<style lang="scss" scoped>
.btn :deep(.el-button + .el-button) {
  margin-left: 0 !important;
}
</style>
