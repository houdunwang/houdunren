<template>
  <master>
    <div class="card shadow-sm">
      <div class="card-header">套餐列表</div>
      <div class="card-body">
        <el-table :data="packages" stripe empty-text=" ">
          <el-table-column prop="name" label="名称" width="100"> </el-table-column>
          <el-table-column label="可用模块">
            <template slot-scope="scope">
              <el-tag v-for="m in scope.row.modules" :key="m.id">
                {{ m.name }}
              </el-tag>
            </template>
          </el-table-column>
          <el-table-column label="用户组">
            <template slot-scope="scope">
              <el-tag v-for="g in scope.row.group" :key="g.id">
                {{ g.name }}
              </el-tag>
            </template>
          </el-table-column>
          <el-table-column label="系统套餐">
            <template slot-scope="scope">
              <i class="el-icon-success text-success" v-if="scope.system"></i>
            </template>
          </el-table-column>
          <el-table-column label="" width="150">
            <template slot-scope="scope">
              <el-button-group>
                <el-button size="mini">
                  <router-link :to="{ name: 'system.package.edit', params: { id: scope.row.id } }">编辑</router-link>
                </el-button>
                <el-button size="mini" @click="del(scope.row)">删除</el-button>
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
      packages: []
    }
  },
  async created() {
    let response = await this.axios.get('/system/package')
    this.$set(this, 'packages', response.data.data)
  },
  methods: {
    async del(p) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        center: true
      }).then(async () => {
        await this.axios.delete(`/system/package/${p.id}`)
        this.$message.success('删除成功')
        this.$router.go(0)
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
