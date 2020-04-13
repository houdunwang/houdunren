<template>
  <div>
    <tab />
    <div class="card">
      <div class="card-header">课程列表</div>
      <div class="card-body">
        <el-table :data="lessons.data" border stripe style="width: 100%">
          <el-table-column
            v-for="col in columns"
            :prop="col.id"
            :key="col.id"
            :label="col.label"
            :width="col.width"
          ></el-table-column>
          <el-table-column label="预览图" width="100">
            <template slot-scope="scope">
              <img :src="scope.row.preview" class :style="{width:'35px'}" />
            </template>
          </el-table-column>
          <el-table-column label="操作" width="120">
            <template slot-scope="scope">
              <div class="btn-group btn-group-sm">
                <router-link
                  class="btn btn-outline-secondary"
                  type="button"
                  aria-label
                  :to="{name:'admin.system.edit',params:{id:scope.row.id}}"
                >编辑</router-link>
                <button
                  class="btn btn-outline-danger"
                  type="button"
                  aria-label
                  @click="del(scope.row)"
                >删除</button>
              </div>
            </template>
          </el-table-column>
        </el-table>

        <el-pagination
          class="mt-3"
          :hide-on-single-page="true"
          background
          layout="prev, pager, next"
          :total="lessons.meta.total"
          @current-change="load"
        ></el-pagination>
      </div>
    </div>
  </div>
</template>

<script>
import Tab from './Tab'
export default {
  components: { Tab },
  data() {
    return {
      lessons: { meta: { total: 0 } },
      columns: [
        { id: 'id', prop: 'id', label: '编号', width: 60 },
        { id: 'title', prop: 'title', label: '课程名称' },
        { id: 'description', prop: 'description', label: '课程介绍', width: 250 }
      ]
    }
  },
  created() {
    this.load()
  },
  methods: {
    async del(lesson) {
      this.$confirm('确定删除课程吗？', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(async () => {
          await this.axios.delete('edu/admin/system/${lesson.id}')
          this.lessons.splice(this.lessons.indexOf(lesson), 1)
        })
        .catch(() => {})
    },
    async load(page = 1) {
      let response = await this.axios.get(`edu/admin/system?page=${page}`).then(r => r.data)
      this.$set(this, 'lessons', response)
    }
  }
}
</script>

<style></style>
