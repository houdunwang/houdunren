<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'admin.lesson.index',query:{sid:site.id} }">课程列表</router-link>
      <router-link
        class="nav-link"
        :class="{ active: !form.id }"
        :to="{ name: 'admin.lesson.create' }"
      >发表课程</router-link>
      <router-link
        class="nav-link active"
        v-show="form.id"
        :to="{ name: 'admin.lesson.create',query:{sid:site.id} }"
      >编辑课程</router-link>
    </nav>
    <a-alert message="设置「售价」后免费观看数量才有效" type="success"></a-alert>
    <a-form-model
      :model="form"
      ref="form"
      :rules="rules"
      :label-col="{span:3}"
      :wrapper-col="{span:10}"
      class="mt-2"
    >
      <a-card title="课程资料" size="small" hoverable>
        <a-form-model-item label="课程名称" prop="title">
          <a-input v-model="form.title"></a-input>
        </a-form-model-item>
        <a-form-model-item label="简单介绍" prop="description">
          <a-input type="textarea" :rows="3" v-model="form.description"></a-input>
        </a-form-model-item>
        <a-form-model-item label="上架">
          <a-checkbox v-model="form.status"></a-checkbox>
        </a-form-model-item>
        <a-form-model-item label="网站标志">
          <a-upload
            name="file"
            listType="picture-card"
            class="avatar-uploader"
            :showUploadList="false"
            :action="`/api/common/upload/site?sid=${site.id}`"
            @change="uploadThumb"
            :headers="headers"
          >
            <img v-if="form.thumb" :src="form.thumb" alt="avatar" />
            <div v-else>
              <div class="ant-upload-text">
                <i class="fa fa-file-image-o fa-4x" aria-hidden="true"></i>
              </div>
            </div>
          </a-upload>
        </a-form-model-item>
        <a-form-model-item label="推荐">
          <a-radio-group v-model="form.is_commend" buttonStyle="solid">
            <a-radio-button :value="true">是</a-radio-button>
            <a-radio-button :value="false">否</a-radio-button>
          </a-radio-group>
        </a-form-model-item>
      </a-card>
      <a-card title="销售" size="small" class="mt-2" hoverable>
        <a-form-model-item label="免费观看数量">
          <a-input type="number" v-model="form.free_num"></a-input>
        </a-form-model-item>
        <a-form-model-item label="售价">
          <a-input type="number" v-model="form.price"></a-input>
        </a-form-model-item>
        <a-form-model-item label="高清下载地址">
          <a-input type="textarea" :row="3" v-model="form.download_address"></a-input>
        </a-form-model-item>
      </a-card>
      <a-card title="标签" size="small" hoverable class="mt-2">
        <a-checkbox-group :options="tags" v-model="form.tags"></a-checkbox-group>
      </a-card>
      <a-card title="视频编辑" size="small" hoverable class="mt-2">
        <div class="card mt-2" v-for="(video, index) in form.videos" :key="index">
          <div class="card-body">
            <a-form-model-item label="视频名称" class="mb-0">
              <a-input v-model="video.title" required></a-input>
            </a-form-model-item>
            <a-form-model-item label="视频地址" class="mb-0">
              <a-input v-model="video.path"></a-input>
            </a-form-model-item>
            <a-form-model-item label="外部播放地址" class="mb-0">
              <a-input v-model="video.external_address"></a-input>
            </a-form-model-item>
          </div>
          <div class="card-footer text-muted">
            <div class="btn-group" role="group" aria-label>
              <button
                type="button"
                class="btn btn-outline-secondary btn-sm"
                @click="delVideo(index)"
              >删除</button>
              <button
                type="button"
                class="btn btn-outline-secondary btn-sm"
                @click="insertVideo(index)"
              >插入视频</button>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-footer">
            <button type="button" class="btn btn-secondary btn-sm" @click="addVideo">添加视频</button>
          </div>
        </div>
      </a-card>
    </a-form-model>
    <button type="button" class="btn btn-primary mt-2" @click="onSubmit">保存提交</button>
  </div>
</template>

<script>
import systemUpload from '@/services/upload'
import { mapState } from 'vuex'
import token from '@/services/token'
const rules = {
  title: [{ required: true, message: '课程名称不能为空', trigger: 'change' }],
  description: [{ required: true, message: '课程介绍不能为空', trigger: 'change' }]
}
export default {
  props: {
    action: String,
    method: { type: String, default: 'post' },
    form: {
      type: Object,
      default: () => {
        return { status: true, is_commend: false, thumb: '', free_num: 1, tags: [], videos: [] }
      }
    }
  },
  data() {
    return {
      headers: { Authorization: 'Bearer ' + token.get() },
      rules,
      tags: []
    }
  },
  computed: {
    ...mapState('site', ['site'])
  },
  async created() {
    let response = await this.axios.get(`edu/admin/tag?sid=${this.site.id}`)
    this.$set(
      this,
      'tags',
      response.data.map(tag => {
        return { label: tag.title, value: tag.id }
      })
    )
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          let response = await this.axios[this.method](this.action, this.form)
          this.$message.success('发表成功')
          this.$router.push({ name: 'admin.lesson.index', query: { sid: this.site.id } })
        }
      })
    },
    //上传预览图
    uploadThumb(response) {
      if (response.file.status === 'done') {
        this.$set(this.form, 'thumb', response.file.response.path)
      }
    },
    delVideo(index) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(() => {
          this.form.videos.splice(index, 1)
        })
        .catch(() => {})
    },
    addVideo() {
      this.form.videos.push({ title: '', path: '' })
    },
    insertVideo(index) {
      this.form.videos.splice(index + 1, 0, { title: '', path: '' })
    }
  }
}
</script>

<style></style>
