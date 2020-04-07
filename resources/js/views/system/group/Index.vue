<template>
  <master>
    <div class="card shadow-sm">
      <div class="card-header">用户组列表</div>
      <div class="card-body">
        <el-table :data="groups" stripe :empty-text="tableMessage">
          <el-table-column prop="id" label="编号" width="60"> </el-table-column>
          <el-table-column prop="name" label="名称" width="120"> </el-table-column>
          <el-table-column label="可创建站点数量" width="150">
            <template slot-scope="scope">
              <el-tag size="mini" type="info" class="m-1">{{ scope.row.site_num }}</el-tag>
            </template>
          </el-table-column>
          <el-table-column label="套餐">
            <template slot-scope="scope">
              <el-tag size="mini" type="warning" v-for="p in scope.row.packages" :key="p.id" class="m-1">
                <router-link class="text-secondary" :to="{ name: 'system.package.edit', params: { id: p.id } }">
                  {{ p.name }}
                </router-link>
              </el-tag>
            </template>
          </el-table-column>
          <el-table-column label="默认组" width="150">
            <template slot-scope="scope">
              <i class="el-icon-success text-success" v-show="scope.row.default"></i>
            </template>
          </el-table-column>
          <el-table-column label="" width="150">
            <template slot-scope="scope">
              <el-button-group>
                <el-button
                  type="mini"
                  @click="$router.push({ name: 'system.group.edit', params: { id: scope.row.id } })"
                  >编辑</el-button
                >
                <el-button type="mini" @click="del(scope.row)" v-if="!scope.row.default">删除</el-button>
              </el-button-group>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>
  </master>
</template>

<script>
import Master from './layouts/Master'

export default {
  components: { Master },
  data() {
    return {
      groups: [],
      tableMessage: '加载中...',
    }
  },
  async created() {
    let response = await this.axios.get('/system/group')
    this.$set(this, 'groups', response.data.data)
  },
  methods: {
    async del(g) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        center: true,
      }).then(async () => {
        await this.axios.delete(`/system/group/${g.id}`)
        this.$message.success('删除成功')
        this.$router.go(0)
      })
    },
  },
}
</script>

<style scoped>
img {
  max-width: 100%;
  border: solid 1px #ddd;
}
</style>
