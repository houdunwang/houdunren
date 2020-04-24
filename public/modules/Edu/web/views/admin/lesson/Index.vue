<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <a class="nav-link active" href="#">课程列表</a>
      <router-link
        class="nav-link"
        :to="{ name: 'admin.lesson.create', query: { sid: site.id } }"
      >发表列表</router-link>
    </nav>
    <a-table
      v-if="lesson.data"
      rowKey="id"
      size="middle"
      bordered
      :columns="columns"
      :dataSource="lesson.data"
      :pagination="{
        total: lesson.meta.total,
        current: lesson.meta.current_page,
        defaultPageSize:10,
        hideOnSinglePage: true
      }"
      @change="load"
    >
      <div slot="action" slot-scope="scope">
        <div class="btn-group btn-group-sm" role="group">
          <router-link
            :to="{ name: 'admin.lesson.edit', params: { id: scope.id }, query: { sid: site.id } }"
            class="btn btn-outline-success"
          >编辑</router-link>
          <a class="btn btn-outline-secondary" @click="del(scope)">删除</a>
        </div>
      </div>
    </a-table>
    <!-- <div class="card">
      <div class="card-header bg-light">课程列表</div>
      <div class="card-body">
        <el-table :data="lesson.data" border style="width: 100%" empty-text=" ">
          <el-table-column label="#编号" prop="id" width="60"></el-table-column>
          <el-table-column label="封面图" width="80">
            <template slot-scope="scope">
              <img
                :style="{ width: '30px', height: '30px' }"
                :src="scope.row.thumb"
                class="rounded"
              />
            </template>
          </el-table-column>
          <el-table-column
            v-for="col in columns"
            :prop="col.prop"
            :key="col.id"
            :label="col.label"
            :width="col.width"
            class="small"
          ></el-table-column>
          <el-table-column label="上架" width="60">
            <template slot-scope="scope">
              <i
                class="fa fa-check-circle-o text-success"
                aria-hidden="true"
                v-if="scope.row.status"
              ></i>
              <i class="fa fa-times-circle-o text-danger" aria-hidden="true" v-else></i>
            </template>
          </el-table-column>
          <el-table-column label="操作" width="120">
            <template slot-scope="scope">
              <div class="btn-group btn-group-sm" role="group">
                <router-link
                  :to="{ name: 'admin.lesson.edit', params: { id: scope.row.id } }"
                  class="btn btn-outline-success"
                >编辑</router-link>
                <a class="btn btn-outline-secondary" @click="del(scope.row)">删除</a>
              </div>
            </template>
          </el-table-column>
        </el-table>
        <el-pagination
          class="mt-3"
          background
          :hide-on-single-page="true"
          layout="prev, pager, next"
          :total="lesson.total"
          @current-change="load"
        ></el-pagination>
      </div>
    </div>-->
  </div>
</template>

<script>
import { mapState } from 'vuex'
const columns = [
  { key: 'id', dataIndex: 'id', title: '编号', width: 80 },
  { key: 'title', dataIndex: 'title', title: '课程名称' },
  { key: 'read_num', dataIndex: 'read_num', title: '游览量', width: 80 },
  { key: 'favorite_num', dataIndex: 'favorite_num', title: '收藏数', width: 80 },
  { key: 'comment_num', dataIndex: 'comment_num', title: '评论数', width: 80 },
  { key: 'video_num', dataIndex: 'video_num', title: '视频数量', width: 120 },
  { key: 'price', dataIndex: 'price', title: '售价', width: 100 },
  { title: '', width: 120, scopedSlots: { customRender: 'action' } }
]
export default {
  data() {
    return {
      lesson: [],
      columns
    }
  },
  created() {
    this.load({ current: 1 })
  },
  computed: {
    ...mapState('site', ['site'])
  },
  methods: {
    async load({ current = 1 }) {
      let response = await this.axios.get(`edu/admin/lesson?sid=${this.site.id}&page=${current}`).then(r => r.data)

      this.$set(this, 'lesson', response)
    },
    async del(lesson) {
      this.$confirm('确定删除课程吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(async () => {
          await this.axios.delete(`edu/admin/lesson/${lesson.id}`)
          this.$message.success('删除成功')
          this.lesson.splice(this.lessons.indexOf(lesson), 1)
        })
        .catch(() => {})
    }
  }
}
</script>
<style lang="scss" scoped></style>
