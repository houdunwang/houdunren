<template>
  <master>
    <el-form :model="form" :rules="rules" ref="form" label-width="100px">
      <div class="card">
        <div class="card-header">
          服务套餐管理
        </div>
        <div class="card-body">
          <el-form-item label="套餐名称" prop="name">
            <el-input v-model="form.name"></el-input>
          </el-form-item>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header">
          套餐模块选择
        </div>
        <div class="card-body">
          <el-table
            :data="moduleList"
            border
            stripe
            ref="multipleTable"
            @selection-change="handleSelectionChange"
            empty-text="加载中"
          >
            <el-table-column type="selection" width="55"></el-table-column>
            <el-table-column width="100" label="图标">
              <template slot-scope="scope">
                <el-avatar shape="square" :size="50" :src="scope.row.package.thumb"></el-avatar>
              </template>
            </el-table-column>
            <el-table-column
              v-for="col in columns"
              :prop="col.prop"
              :key="col.name"
              :label="col.label"
              :width="col.width"
            >
            </el-table-column>
          </el-table>
        </div>
      </div>
      <el-button class="mt-3" type="primary" @click="submit('form')">保存提交</el-button>
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
        name: ''
      },
      //系统所有模块列表
      moduleList: [],
      //静音验证规则
      rules: {
        name: [
          { required: true, message: '套餐名称不能为空', trigger: 'blur' },
          { min: 3, message: '套餐名称不能少于3个字符', trigger: 'blur' }
        ]
      },
      //模块表格字段
      columns: [
        { label: '模块名称', prop: 'package.title' },
        { label: '版本号', prop: 'package.version' }
      ],
      //选中的模块
      multipleSelection: []
    }
  },
  components: { Master },
  async created() {
    //获取所有模块列表
    let modules = await this.axios('/system/module/installed').then(r => r.data.data)
    this.$set(this, 'moduleList', modules)

    //编辑时获取原数据
    if (this.action === 'edit') {
      let id = this.$route.params.id
      let response = await this.axios.get(`/system/package/${id}`).then(r => r.data.data)
      this.$set(this.form, 'name', response.name)
      //设置模块的选中状态
      this.moduleList.map(m =>
        response.modules.map(pm => {
          if (pm.model.id === m.model.id) this.$refs.multipleTable.toggleRowSelection(m)
        })
      )
    }
  },
  methods: {
    async submit() {
      //验证成功时提表单
      this.$refs['form'].validate(async valid => {
        if (valid) {
          //发送的表单数据
          let formData = {
            name: this.form.name,
            modules: this.multipleSelection.map(m => m.model.id)
          }
          switch (this.action) {
            case 'add':
              await this.axios.post('/system/package', formData)
              this.$message.success('套餐添加成功')
              this.$router.push({ name: 'system.package.index' })
              break
            case 'edit':
              await this.axios.put(`/system/package/${this.$route.params.id}`, formData)
              this.$message.success('套餐编辑成功')
              this.$router.push({ name: 'system.package.index' })
              break
          }
        } else {
          return false
        }
      })
    },
    //多选模块时的处理
    handleSelectionChange(modules) {
      this.multipleSelection = modules
    }
  }
}
</script>

<style scoped></style>
