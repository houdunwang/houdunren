<script setup lang="ts">
const { getAll, collections, install, unInstall } = useModule()
await getAll()
const { open } = useUtil()
const search = ref('')
const columns = ref([
  { id: 'name', label: '应用' },
  { id: 'version', label: '版本' },
  { id: 'domain', label: ' 域名' },
  { id: 'author', label: '作者' },
])
</script>

<template>
  <main>
    <!-- 应用列表 -->
    <section class="mt-3">
      <el-table :data="collections" border stripe>
        <el-table-column v-for="col in columns" :prop="col.id" :key="col.id" :label="col.label">
          <template #default="{ row }">
            <div v-if="col.id == 'domain'">
              {{ row.model?.domain }}
            </div>
            <div class="" v-else>
              {{ row.config[col.id] }}
            </div>
          </template>
        </el-table-column>
        <el-table-column label="操作" :width="180" align="center" #default="{ row }">
          <div class="flex gap-1 btn">
            <el-button type="danger" size="small" plain @click="unInstall(row.name)" v-if="row.is_install">
              卸载
            </el-button>
            <el-button type="info" size="small" plain @click="install(row.name)" v-else>安装</el-button>
            <el-button
              type="primary"
              size="small"
              plain
              @click="open(`/${row.name}/admin`)"
              :disabled="!row.is_install">
              管理
            </el-button>
            <el-button
              type="success"
              size="small"
              plain
              @click="$router.push({ name: 'module.edit', query: { id: row.model.id } })"
              :disabled="!row.is_install">
              配置
            </el-button>
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
