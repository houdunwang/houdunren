<template>
  <div>
    <a-form-model
      ref="form"
      :model="form"
      :rules="rules"
      :label-col="{ span: 3 }"
      :wrapper-col="{ span: 10 }"
    >
      <a-card size="small" hoverable title="服务套餐管理">
        <a-form-model-item label="套餐名称" prop="name" ref="name">
          <a-input v-model="form.name"></a-input>
        </a-form-model-item>
      </a-card>
      <a-card size="small" title="模块选择" bordered hoverable class="mt-2">
        <a-table
          bordered
          size="middle"
          :pagination="false"
          :rowKey="_ => _.model.id"
          :columns="columns"
          :dataSource="moduleList"
          :rowSelection="{ selectedRowKeys: form.modules, onChange: onSelectChange }"
        ></a-table>
      </a-card>
      <a-form-model-item class="mt-2">
        <a-button type="primary" @click="submit">保存提交</a-button>
      </a-form-model-item>
    </a-form-model>
  </div>
</template>

<script>
const form = {
  name: '',
  modules: []
}
export default {
  props: {
    action: String,
    method: { type: String, default: 'post' },
    form: {
      type: Object,
      default: () => form
    }
  },
  data() {
    return {
      //系统所有模块
      moduleList: [],
      columns: [
        { title: '编号', dataIndex: 'model.id', key: 'model.id', width: 60 },
        { title: '模块名称', dataIndex: 'config.title', key: 'config.title' },
        { title: '标识', dataIndex: 'config.name', key: 'config.name' },
        { title: '版本号', dataIndex: 'config.version', key: 'config.version' }
      ],
      rules: {
        name: [{ required: true, message: '套餐名称不能为空', trigger: 'blur' }]
      }
    }
  },
  async created() {
    //获取所有模块
    let response = await this.axios(`/system/module/installed`)
    this.$set(this, 'moduleList', response.data)
  },
  methods: {
    submit() {
      this.$refs.form.validate(async valid => {
        if (valid) {
          await this.axios[this.method](this.action, this.form)
          this.$message.success('保存成功')
          this.$router.push({ name: 'system.package' })
        }
      })
    },
    onSelectChange(selectedRowKeys, selectedRows) {
      this.$set(this.form, 'modules', selectedRowKeys)
    }
  }
}
</script>
