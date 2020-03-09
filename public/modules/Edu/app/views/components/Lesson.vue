<template>
  <div>
    <div class="card">
      <div class="card-header">
        <div class="input-group mb-3">
          <input
            type="text"
            v-model="title"
            class="form-control"
            required
            placeholder="请输入课程标题"
            aria-label="Recipient's username"
            aria-describedby="basic-addon2"
            @keyup.enter="search"
          />
          <div class="input-group-append">
            <button type="button" class="input-group-text" id="basic-addon2" @click="search">搜索课程</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <el-table :data="data" border stripe>
          <el-table-column
            v-for="col in columns"
            :prop="col.id"
            :key="col.id"
            :label="col.label"
            :width="col.width"
          ></el-table-column>
          <el-table-column label="操作" width="80">
            <template slot-scope="scope">
              <div class="btn-group btn-group-sm">
                <button
                  v-if="!isAdd(scope.row)"
                  class="btn btn-outline-success"
                  type="button"
                  @click="add(scope.row)"
                >添加</button>
                <button
                  v-if="isAdd(scope.row)"
                  class="btn btn-outline-danger"
                  type="button"
                  @click="del(scope.row)"
                >删除</button>
              </div>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: { lessons: Array },
  data() {
    return {
      data: [],
      title: '',
      columns: [
        { id: 'id', prop: 'id', label: '编号', width: 80 },
        { id: 'title', prop: 'title', label: '课程标题' },
        { id: 'read_num', prop: 'read_num', label: '游览量', width: 80 },
        { id: 'favorite_num', prop: 'favorite_num', label: '收藏数', width: 80 },
        { id: 'comment_num', prop: 'comment_num', label: '评论数', width: 80 },
        { id: 'video_num', prop: 'video_num', label: '视频数量', width: 80 }
      ]
    }
  },
  created() {
    this.search()
  },
  methods: {
    async search() {
      let response = await this.axios
        .post(`edu/admin/lesson/search`, {
          title: this.title
        })
        .then(r => r.data.data)

      this.$set(this, 'data', response)
    },
    isAdd(lesson) {
      return this.lessons.includes(lesson)
    },
    add(lesson) {
      this.lessons.push(lesson)
    },
    del(lesson) {
      this.lessons.splice(this.lessons.indexOf(lesson), 1)
    }
  }
}
</script>

<style>
</style>
