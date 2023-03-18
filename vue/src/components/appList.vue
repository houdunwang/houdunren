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
  { id: 'name', label: '应用' },
  { id: 'version', label: '版本' },
  { id: 'author', label: '作者' },
])
</script>

<template>
  <main class="">
    <!-- <el-input v-model="search" placeholder="" size="large" clearable>
      <template #append>
        <el-button type="primary" size="default" @click="">搜索</el-button>
      </template>
    </el-input> -->

    <!-- 应用列表 -->
    <section class="mt-3">
      <el-table :data="tableData" border stripe>
        <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label"> </el-table-column>
        <el-table-column label="操作" :width="120" align="center">
          <div class="flex gap-1 btn">
            <el-button type="success" size="small" plain @click="">管理</el-button>
            <el-button type="warning" size="small" plain @click="">卸载</el-button>
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
