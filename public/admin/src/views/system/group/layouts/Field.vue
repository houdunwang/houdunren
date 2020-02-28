<template>
  <master>
    <el-form :model="form" ref="form" label-width="100px">
      <div class="card">
        <div class="card-header">用户组设置</div>
        <div class="card-body">
          <el-form-item
            label="会员组名称"
            prop="name"
            :rules="[
              { required: true, message: '会员组名称不能为空', trigger: 'blur' },
              { min: 3, message: '会员组名称不能少于 3 位', trigger: 'blur' }
            ]"
          >
            <el-input v-model="form.name" placeholder="会员组名称可以输入中文名称"></el-input>
          </el-form-item>
          <el-form-item
            label="站点数量"
            prop="site_num"
            :rules="[
              { required: true, message: '会员组可创建站点数量不能为空' },
              { type: 'number', message: '站点数量必须为数字值' }
            ]"
          >
            <el-input v-model="form.site_num" placeholder="会员组用户可创建的站点数量"></el-input>
          </el-form-item>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header">可使用的服务套餐</div>
        <div class="card-body">
          <el-table
            :data="packages"
            ref="multipleTable"
            @selection-change="handleSelectionChange"
            empty-text="加载中.."
          >
            <el-table-column type="selection" width="55"> </el-table-column>
            <el-table-column label="编号" prop="id"></el-table-column>
            <el-table-column label="名称" prop="name"> </el-table-column>
            <el-table-column label="可用模块">
              <template slot-scope="scope">
                <el-tag size="mini" v-for="m in scope.row.modules" :key="m.id" class="mr-1 mb-1">
                  {{ m.config.title }}
                </el-tag>
              </template>
            </el-table-column>
            <el-table-column label="使用该套餐的用户组">
              <template slot-scope="scope">
                <el-tag size="mini" type="success" v-for="g in scope.row.group" :key="g.id">
                  {{ g.name }}
                </el-tag>
              </template>
            </el-table-column>
          </el-table>
        </div>
      </div>
      <el-button type="primary" @click="submit" class="mt-3">确定提交</el-button>
    </el-form>
  </master>
</template>

<script>
import Master from './Master'

export default {
  props: ['action'],
  data() {
    return {
      form: {
        name: '',
        site_num: 3,
        package_id: []
      },
      packages: [],
      //套餐多选
      multipleSelection: []
    }
  },
  components: { Master },
  async created() {
    let response = await this.axios('/system/package')
    this.$set(this, 'packages', response.data.data)
    if (this.action === 'edit') {
      let id = this.$route.params.id
      let data = await this.axios.get(`/system/group/${id}`).then(r => r.data.data)
      this.$set(this, 'form', data)

      this.packages.map(p => {
        this.form.packages.map(gp => {
          if (p.id === gp.id) this.$refs.multipleTable.toggleRowSelection(p)
        })
      })
    }
  },
  methods: {
    async submit() {
      this.$refs['form'].validate(async state => {
        if (state) {
          let id = this.$route.params.id
          this.form.package_id = this.multipleSelection.map(p => p.id)
          switch (this.action) {
            case 'add':
              await this.axios.post('/system/group', this.form)
              this.$message.success('用户组添加成功')
              this.$router.push({ name: 'system.group' })
              break
            case 'edit':
              await this.axios.put(`/system/group/${id}`, this.form)
              this.$message.success('用户组编辑成功')
              this.$router.push({ name: 'system.group' })
              break
          }
        }
      })
    },
    handleSelectionChange(val) {
      this.multipleSelection = val
    }
  }
}
</script>

<style scoped></style>
