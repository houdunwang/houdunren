<template>
  <div>
    <tab />
    <div class="card">
      <div class="card-header">课程资料</div>
      <div class="card-body">
        <el-form ref="form" :model="form" label-width="80px">
          <el-form-item
            label="课程标题"
            prop="title"
            :rules="[
              { required: true, message: '课程标题不能为空' },
            ]"
          >
            <el-input v-model="form.title"></el-input>
          </el-form-item>
          <el-form-item
            label="课程介绍"
            prop="description"
            :rules="[
              { required: true, message: '课程介绍不能为空' },
            ]"
          >
            <el-input type="textarea" v-model="form.description"></el-input>
          </el-form-item>
          <el-form-item
            label="课程图片"
            prop="preview"
            :rules="[
              { required: true, message: '请上传预览图' },
            ]"
          >
            <el-upload
              class="avatar-uploader"
              action="/common/upload"
              accept="image/jpeg, image/png"
              :show-file-list="false"
              :on-success="upload"
              :on-error="uploadError"
            >
              <img
                v-if="form.preview"
                :src="form.preview"
                class="avatar"
                :style="{maxHeight:'200px'}"
              />
              <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>
          </el-form-item>
        </el-form>
      </div>
    </div>
    <div class="card mt-2">
      <div class="card-header">课程列表</div>
      <div class="card-body">
        <el-table :data="form.lessons" border stripe>
          <el-table-column
            v-for="col in lessonColumns"
            :prop="col.id"
            :key="col.id"
            :label="col.label"
            :width="col.width"
          ></el-table-column>
          <el-table-column label="操作" width="80">
            <template slot-scope="scope">
              <div class="btn-group btn-group-sm">
                <button
                  class="btn btn-outline-secondary"
                  type="button"
                  aria-label
                  @click="delLesson(scope.row)"
                >删除</button>
              </div>
            </template>
          </el-table-column>
        </el-table>
      </div>
      <div class="card-footer text-muted">
        <button class="btn btn-outline-secondary btn-sm" @click="selectLessonDialog=true">选择课程</button>
      </div>
    </div>
    <button class="btn btn-primary mt-2" type="button" @click="submit">保存提交</button>

    <!-- 选择课程 -->
    <el-dialog title="选择课程" :visible.sync="selectLessonDialog" width="60%">
      <lesson :lessons.sync="form.lessons" />
    </el-dialog>
  </div>
</template>

<script>
import Tab from './Tab'
import Lesson from '@/views/admin/components/Lesson'
export default {
  components: { Tab, Lesson },
  props: { form: Object },
  data() {
    return {
      lessonColumns: [
        { id: 'id', prop: 'id', label: '编号', width: 80 },
        { id: 'title', prop: 'title', label: '课程标题' },
        { id: 'read_num', prop: 'read_num', label: '游览量', width: 80 },
        { id: 'favorite_num', prop: 'favorite_num', label: '收藏数', width: 80 },
        { id: 'comment_num', prop: 'comment_num', label: '评论数', width: 80 },
        { id: 'video_num', prop: 'video_num', label: '视频数量', width: 80 }
      ],
      selectLessonDialog: false
    }
  },
  methods: {
    upload(file) {
      this.$set(this.form, 'preview', file.path)
    },
    uploadError() {
      this.$message.error('文件过大或类型不匹配')
    },
    async submit() {
      this.$refs['form'].validate(valid => {
        if (valid) {
          const lessons = this.form.lessons.map(l => l.id)
          this.$emit('submit', {
            ...this.form,
            lessons
          })
        }
      })
    },
    delLesson(lesson) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(() => {
          let index = this.form.lessons.indexOf(lesson)
          this.form.lessons.splice(index, 1)
        })
        .catch(() => {})
    }
  }
}
</script>

<style>
</style>
