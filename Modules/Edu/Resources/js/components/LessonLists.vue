<template>
  <div>
    <el-dialog title="提示" :visible.sync="showSelectLessonModal" width="50%">
      <lesson-search @add="add"></lesson-search>
    </el-dialog>

    <div class="card mt-3">
      <div class="card-header">课程列表</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
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

            <draggable
              tag="tbody"
              :list="lessons"
              :disabled="!enabled"
              ghost-class="ghost"
              @start="dragging = true"
              @end="dragging = false"
            >
              <tr v-for="lesson in lessons" :key="lesson.id">
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
                    <a href="#" class="btn btn-info" @click.prevent="remove(lesson)">移除</a>
                  </div>
                </td>
              </tr>
            </draggable>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <button
          type="button"
          class="btn btn-info btn-sm"
          @click.prevent="showSelectLessonModal = true"
        >添加课程</button>
      </div>
    </div>

    <textarea name="lessons" v-html="lessons" hidden></textarea>
  </div>
</template>

<script>
import LessonSearch from './LessonSearch'
import draggable from 'vuedraggable'
import _ from 'lodash'
export default {
  components: {
    LessonSearch,
    draggable,
  },
  data() {
    return {
      enabled: true,
      showSelectLessonModal: false,
      lessons: window.lessons,
    }
  },
  computed: {
    ids() {
      return this.lessons.map((lesson) => lesson.id)
    },
  },
  methods: {
    add(lesson) {
      this.lessons.push(lesson)
      this.lessons = _.unionBy(this.lessons, (lesson) => lesson.id)
    },
    remove(lesson){
       this.lessons =  this.lessons.filter((l)=>l.id != lesson.id)
    }
  },
}
</script>

<style scoped>
.ghost {
  opacity: 0.5;
  background: #c8ebfb;
}
</style>
