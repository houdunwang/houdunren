<template>
  <div>
    <div class="input-group mb-1">
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
    <a-table :columns="columns" :dataSource="data" bordered rowKey="id">
      <div slot="action" slot-scope="lesson">
        <div class="btn-group btn-group-sm">
          <button
            v-if="!isAdd(lesson)"
            class="btn btn-outline-success"
            type="button"
            @click="add(lesson)"
          >添加</button>
          <button
            v-if="isAdd(lesson)"
            class="btn btn-outline-danger"
            type="button"
            @click="del(lesson)"
          >删除</button>
        </div>
      </div>
    </a-table>
  </div>
</template>

<script>
import { mapState } from 'vuex'
const columns = [
  { key: 'id', dataIndex: 'id', title: '编号', width: 80 },
  { key: 'title', dataIndex: 'title', title: '课程标题' },
  { key: 'read_num', dataIndex: 'read_num', title: '游览量', width: 80 },
  { key: 'favorite_num', dataIndex: 'favorite_num', title: '收藏数', width: 80 },
  { key: 'comment_num', dataIndex: 'comment_num', title: '评论数', width: 80 },
  { key: 'video_num', dataIndex: 'video_num', title: '视频数量', width: 120 },
  { scopedSlots: { customRender: 'action' }, width: 80 }
]
export default {
  //   name: '选择课程',
  props: { lessons: { type: Array } },
  data() {
    return {
      data: [],
      title: '',
      columns
    }
  },
  computed: {
    ...mapState('site', ['site'])
  },
  created() {
    this.search()
  },
  methods: {
    async search() {
      let response = await this.axios
        .post(`edu/admin/lesson/search?sid=${this.site.id}`, {
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
