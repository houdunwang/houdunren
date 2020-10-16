<template>
  <div>
    <el-table ref="multipleTable" :data="templates" border tooltip-effect="dark" style="width: 100%" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="60"></el-table-column>
      <el-table-column prop="id" width="80" label="编号"></el-table-column>
      <el-table-column prop="preview" width="80" label="预览图">
        <template slot-scope="scope">
          <img :src="scope.row.preview" style="width: 35px" class="rounded" />
        </template>
      </el-table-column>
      <el-table-column prop="title" label="模板名称"></el-table-column>
      <el-table-column prop="name" label="标识" width="120"></el-table-column>
      <el-table-column prop="version" label="版本号" width="120"></el-table-column>
      <el-table-column prop="author" width="80" label="作者"></el-table-column>
    </el-table>
    <input type="hidden" v-for="template in selected" :key="template.id" :value="template.id" name="templates[]" />
  </div>
</template>

<script>
export default {
  props: {
    ids: { type: Array, default: () => [] },
  },
  data() {
    return {
      templates: [],
      selected: [],
    }
  },
  mounted() {
    this.init().then(() => {
      const rows = this.templates.filter((template) => this.selected.some((m) => m.id === template.id))
      this.toggleSelection(rows)
    })
  },
  methods: {
    async init() {
      this.templates = await this.axios.get(`admin/template/installed`)
      this.selected = this.templates.filter((template) => {
        return this.ids.includes(template.id)
      })
    },
    toggleSelection(rows) {
      if (rows) {
        rows.forEach((row) => {
          this.$refs.multipleTable.toggleRowSelection(row)
        })
      } else {
        this.$refs.multipleTable.clearSelection()
      }
    },
    handleSelectionChange(val) {
      this.selected = val
    },
  },
}
</script>
