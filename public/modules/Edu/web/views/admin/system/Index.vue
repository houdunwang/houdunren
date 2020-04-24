<template>
  <div>
    <tab />
    <a-table
      v-if="lessons.data"
      bordered
      rowKey="id"
      size="middle"
      :columns="columns"
      :dataSource="lessons.data"
      :pagination="{
        total: lessons.meta.total,
        current: lessons.meta.current_page,
        defaultPageSize:10,
        hideOnSinglePage: true
      }"
      @change="load"
    >
      <div class="btn-group btn-group-sm" role="group" slot="action" slot-scope="scope">
        <router-link
          :to="{ name: 'admin.system.edit', params: { id: scope.id },query:{sid:site.id} }"
          class="btn btn-outline-success"
        >编辑</router-link>
        <a class="btn btn-outline-secondary" @click="del(scope)">删除</a>
      </div>
    </a-table>

    <!-- <el-table :data="lessons.data" border stripe style="width: 100%">
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
    ></el-pagination>-->
  </div>
</template>

<script>
import Tab from './Tab'
import { mapState } from 'vuex'
export default {
  components: { Tab },
  data() {
    return {
      lessons: { meta: { total: 0 } },
      columns: [
        { key: 'id', dataIndex: 'id', title: '编号', width: 60 },
        { key: 'title', dataIndex: 'title', title: '课程名称' },
        { key: 'description', dataIndex: 'description', title: '课程介绍', width: 250 },
        { title: '', width: 120, scopedSlots: { customRender: 'action' } }
      ]
    }
  },
  created() {
    this.load({})
  },
  computed: {
    ...mapState('site', ['site'])
  },
  methods: {
    async del(lesson) {
      this.$confirm({
        content: '确定删除课程吗？',
        onOk: async () => {
          await this.axios.delete(`edu/admin/system/${lesson.id}?sid=${this.site.id}`)
          this.load()
        }
      })
    },
    async load({ current = 1 }) {
      let response = await this.axios.get(`edu/admin/system?page=${current}&sid=${this.site.id}`).then(r => r.data)
      this.$set(this, 'lessons', response)
    }
  }
}
</script>

<style></style>
