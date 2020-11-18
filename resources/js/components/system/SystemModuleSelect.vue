<template>
  <div>
    <el-table ref="multipleTable" :data="modules" border tooltip-effect="dark" style="width: 100%" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="60"></el-table-column>
      <el-table-column prop="id" width="80" label="编号"></el-table-column>
      <el-table-column prop="preview" width="80" label="预览图">
        <template slot-scope="scope">
          <img :src="scope.row.preview" style="width: 35px" class="rounded" />
        </template>
      </el-table-column>
      <el-table-column prop="title" label="模块名称"></el-table-column>
      <el-table-column prop="name" label="标识" width="120"></el-table-column>
      <el-table-column prop="version" label="版本号" width="120"></el-table-column>
      <el-table-column prop="author" label="作者" width="80"></el-table-column>
    </el-table>
    <input type="hidden" v-for="module in selected" :key="module.id" :value="module.id" name="modules[]" />
  </div>
</template>

<script>
export default {
  props: {
    ids: { type: Array, default: () => [] },
  },
  data() {
    return {
      modules: [],
      selected: [],
    }
  },
  mounted() {
    this.init().then(() => this.toggleSelection(this.selected))
  },
  methods: {
    async init() {
      const response = await this.axios.get(`system/module/installed`)
      this.modules = Object.values(response).map((module) => module)
      this.selected = this.modules.filter((module) => this.ids.includes(module.id))
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
