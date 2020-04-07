<template>
  <div>
    <a-form-model
      ref="form"
      :model="form"
      :rules="rules"
      :label-col="{ span: 2 }"
      :wrapper-col="{ span: 8 }"
    >
      <a-card size="small" hoverable title="服务套餐管理">
        <a-form-model-item label="套餐名称" prop="name" ref="name">
          <a-input v-model="form.name"></a-input>
        </a-form-model-item>
      </a-card>
      <a-card size="small" title="模块选择" bordered hoverable class="mt-2">
        <a-table
          size="middle"
          :pagination="false"
          :rowKey="(_) => _.model.id"
          bordered
          :columns="columns"
          :dataSource="moduleList"
          :rowSelection="{selectedRowKeys: moduleIds, onChange: onSelectChange}"
        ></a-table>
      </a-card>
      <a-form-model-item class="mt-2">
        <a-button type="primary" @click="submit">保存提交</a-button>
      </a-form-model-item>
    </a-form-model>
  </div>
</template>

<script>
export default {
  props: {
    form: {
      type: Object,
      default: () => ({ name: '' })
    },
    moduleIds: {
      type: Array,
      default: () => []
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
    let response = await this.axios('/system/module/installed')
    this.$set(this, 'moduleList', response.data)
  },
  methods: {
    submit() {
      this.$refs.form.validate(valid => {
        this.$emit('submit', { ...this.form, modules: this.moduleIds })
      })
    },
    onSelectChange(selectedRowKeys, selectedRows) {
      this.$emit('update:moduleIds', selectedRowKeys)
    }
  }
}
</script>

<style scoped></style>
