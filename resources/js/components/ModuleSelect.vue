<template>
  <div>
    <el-table ref="multipleTable" :data="modules" border tooltip-effect="dark" style="width: 100%;" @selection-change="handleSelectionChange">
      <el-table-column type="selection" width="60"></el-table-column>
      <el-table-column prop="id" width="80" label="编号"></el-table-column>
      <el-table-column prop="preview" width="80" label="预览图">
        <template slot-scope="scope">
          <img :src="scope.row.preview" style="width: 35px;" class="rounded" />
        </template>
      </el-table-column>
      <el-table-column prop="title" label="模块名称"></el-table-column>
      <el-table-column prop="name" label="标识" width="120"></el-table-column>
      <el-table-column prop="version" label="版本号" width="120"></el-table-column>
    </el-table>
    <input type="hidden" v-for="module in selected" :key="module.name" :value="module.id" name="modules[]" />
  </div>
</template>

<script>
export default {
  data() {
    return {
      modules: window.modules || [],
      selected: window.selected || [],
    }
  },
  mounted() {
    const rows = this.modules.filter((module) => this.selected.some((m) => m.id === module.id))

    this.toggleSelection(rows)
  },
  methods: {
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
