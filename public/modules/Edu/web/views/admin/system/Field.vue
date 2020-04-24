<template>
  <div>
    <tab />
    <div class="card">
      <div class="card-header">课程资料</div>
      <div class="card-body">
        <a-form-model :model="form" ref="form" :label-col="{span:3}" :wrapper-col="{span:10}">
          <a-form-model-item label="课程标题">
            <a-input v-model="form.title"></a-input>
          </a-form-model-item>
          <a-form-model-item label="课程介绍">
            <a-input v-model="form.description"></a-input>
          </a-form-model-item>
          <a-form-model-item label="课程图片">
            <a-upload
              name="file"
              listType="picture-card"
              class="avatar-uploader"
              :showUploadList="false"
              :action="`/api/common/upload/site?sid=${site.id}`"
              :headers="headers"
              @change="uploadPreview"
            >
              <img v-if="form.preview" :src="form.preview" alt="avatar" />
              <div v-else>
                <div class="ant-upload-text">
                  <i class="fa fa-file-image-o fa-4x" aria-hidden="true"></i>
                </div>
              </div>
            </a-upload>
          </a-form-model-item>
        </a-form-model>
      </div>
    </div>
    <div class="card mt-2">
      <div class="card-header">课程列表</div>
      <div class="card-body">
        <a-table
          bordered
          :columns="lessonColumns"
          :dataSource="form.lessons"
          rowKey="id"
          :pagination="false"
        >
          <template slot="action" slot-scope="scope">
            <button class="btn btn-outline-danger btn-sm" type="button" @click="delLesson(scope)">删除</button>
          </template>
        </a-table>
      </div>
      <div class="card-footer text-muted">
        <button class="btn btn-outline-secondary btn-sm" @click="selectLessonDialog=true">选择课程</button>
      </div>
    </div>
    <button class="btn btn-primary mt-2" type="button" @click="submit">保存提交</button>
    <!-- 选择课程 -->
    <a-modal title="选择课程" v-model="selectLessonDialog" width="60%" :footer="false">
      <lesson :lessons.sync="form.lessons" />
    </a-modal>
  </div>
</template>

<script>
import token from '@/services/token'
import Tab from './Tab'
import Lesson from '@/views/admin/components/Lesson'
import { mapState } from 'vuex'
const lessonColumns = [
  { key: 'id', dataIndex: 'id', title: '编号', width: 80 },
  { key: 'title', dataIndex: 'title', title: '课程标题' },
  { key: 'read_num', dataIndex: 'read_num', title: '游览量', width: 80 },
  { key: 'favorite_num', dataIndex: 'favorite_num', title: '收藏数', width: 80 },
  { key: 'comment_num', dataIndex: 'comment_num', title: '评论数', width: 80 },
  { key: 'video_num', dataIndex: 'video_num', title: '视频数量', width: 150 },
  { scopedSlots: { customRender: 'action' }, width: 80 }
]
export default {
  components: { Tab, Lesson },
  props: {
    form: {
      type: Object,
      default: () => {
        return { lessons: [] }
      }
    },
    method: { type: String, default: 'post' },
    action: { type: String }
  },
  data() {
    return {
      headers: token.headers(),
      lessonColumns,
      selectLessonDialog: false
    }
  },
  computed: {
    ...mapState('site', ['site'])
  },
  methods: {
    //上传课程预览图
    uploadPreview(response) {
      if (response.file.status === 'done') {
        this.$set(this.form, 'preview', response.file.response.path)
      }
    },
    async submit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          const lessons = this.form.lessons.map(l => l.id)
          await this.axios[this.method](`${this.action}?sid=${this.site.id}`, { ...this.form, lessons })
          this.$message.success('添加成功')
          this.$router.push({ name: 'admin.system.index' })
        }
      })
    },
    delLesson(lesson) {
      this.$confirm({
        content: `确定删除吗？`,
        onOk: () => {
          let index = this.form.lessons.indexOf(lesson)
          this.form.lessons.splice(index, 1)
        }
      })
    }
  }
}
</script>
