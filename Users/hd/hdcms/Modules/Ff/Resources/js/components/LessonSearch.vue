<template>
  <div>
    <div class="input-group mb-1">
      <input
        type="text"
        class="form-control"
        placeholder="请输入课程标题"
        v-model="title"
        @keydown.enter="search"
      />
      <a href="#" class="input-group-append" @click.prevent="search">
        <span class="input-group-text" id="basic-addon2">搜索</span>
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <th width="80">编号</th>
            <th>课程名称</th>
            <th>视频数量</th>
            <th>浏览量</th>
            <th>点赞数</th>
            <th>收藏数</th>
            <th>评论数</th>
            <th>售价</th>
            <th width="80"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="lesson in lessons.data" :key="lesson.id">
            <td>{{ lesson['id'] }}</td>
            <td>
              <a href class="text-secondary">{{ lesson['title'] }}</a>
            </td>
            <td>{{ lesson['video_num'] }}</td>
            <td>{{ lesson['read_num'] }}</td>
            <td>{{ lesson['favour_count'] }}</td>
            <td>{{ lesson['favorite_count'] }}</td>
            <td>{{ lesson['comment_num'] }}</td>
            <td>{{ lesson['price'] }}</td>
            <td class="text-right">
              <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a href="#" class="btn btn-info" @click.prevent="$emit('add',lesson)">选择</a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: '',
      lessons: [],
    }
  },
  mounted() {
    this.search()
  },
  methods: {
    async search() {
      let response = await this.axios.post(`/Edu/admin/search/lesson`, {
        title: this.title,
      })
      this.lessons = response
    },
  },
}
</script>

<style>
</style>
