<template>
  <master>
    <a-form-model
      ref="form"
      :model="form"
      :rules="rules"
      :label-col="{span:2}"
      :wrapper-col="{span:8}"
    >
      <a-card title="用户组设置" size="small">
        <a-form-model-item label="会员组名称" prop="name">
          <a-input v-model="form.name"></a-input>
        </a-form-model-item>
        <a-form-model-item label="站点数量" prop="site_num">
          <a-input type="number" v-model="form.site_num"></a-input>
        </a-form-model-item>
      </a-card>
      <a-card title="可使用的服务套餐" size="small" class="mt-3">
        <a-table
          :dataSource="packages"
          bordered
          size="middle"
          rowKey="id"
          :pagination="false"
          :columns="packageColumns"
          :label-col="{span:2}"
          :wrapper-col="{span:8}"
          :rowSelection="{selectedRowKeys: form.package_id, onChange: onSelectPackageChange}"
        >
          <div slot="modules" slot-scope="p">
            <span
              class="badge badge-info mr-1"
              v-for="m in p.modules"
              :key="m.id"
            >{{ m.model.title }}</span>
          </div>
          <div slot="group" slot-scope="p">
            <span class="badge badge-success mr-1" v-for="g in p.group" :key="g.id">{{ g.name }}</span>
          </div>
        </a-table>
      </a-card>
      <a-form-item>
        <a-button type="primary" @click.prevent="submit">保存提交</a-button>
      </a-form-item>
    </a-form-model>
  </master>
</template>

<script>
import Master from './Master'
const form = {
  type: Object,
  default: () => ({
    name: '',
    site_num: 3,
    package_id: []
  })
}
const rules = {
  name: [{ required: true, message: '用户组名不能为空', trigger: 'blur' }],
  site_num: [
    { required: true, message: '站点数量不能为空', trigger: 'blur' },
    { pattern: /^\d+$/, message: '站点数量只能为数字' }
  ]
}
const packageColumns = [
  { title: '编号', dataIndex: 'id', key: 'id' },
  { title: '套餐', dataIndex: 'name', key: 'name' },
  { title: '模块', scopedSlots: { customRender: 'modules' } },
  { title: '会员组', scopedSlots: { customRender: 'group' } }
]
export default {
  components: { Master },
  props: {
    action: String,
    method: { type: String, default: 'post' },
    form
  },
  data() {
    return {
      packages: [],
      rules,
      packageColumns
    }
  },
  async created() {
    let response = await this.axios('/system/package')
    this.$set(this, 'packages', response.data)
  },
  methods: {
    submit() {
      this.$refs.form.validate(valid => {
        if (valid) {
          this.axios[this.method](this.action, this.form).then(_ => {
            this.$message.success('保存成功')
            this.$router.push({ name: 'system.group' })
          })
        }
      })
    },
    onSelectPackageChange(selectedRowKeys) {
      this.$set(this.form, 'package_id', selectedRowKeys)
    }
  }
}
</script>

<style scoped></style>
