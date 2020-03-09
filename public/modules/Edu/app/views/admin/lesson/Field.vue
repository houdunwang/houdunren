<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'admin.lesson' }">课程列表</router-link>
      <router-link
        class="nav-link"
        :class="{ active: !field.id }"
        :to="{ name: 'admin.lesson.create' }"
      >发表课程</router-link>
      <router-link
        class="nav-link active"
        v-show="field.id"
        :to="{ name: 'admin.lesson.create' }"
      >编辑课程</router-link>
    </nav>

    <div class="alert alert-info">设置「售价」后免费观看数量才有必要设置</div>
    <el-form ref="form" :model="field" label-width="100px">
      <div class="card">
        <div class="card-header">课程资料</div>
        <div class="card-body">
          <el-form-item
            label="课程名称"
            prop="title"
            :rules="[
              { required: true, message: '请输入课程标题' },
            ]"
          >
            <el-input v-model="field.title"></el-input>
          </el-form-item>
          <el-form-item
            prop="description"
            label="简单介绍"
            :rules="[
              { required: true, message: '请输入课程介绍' },
            ]"
          >
            <el-input type="textarea" v-model="field.description"></el-input>
          </el-form-item>
          <el-form-item label="标签">
            <el-checkbox v-for="t in tags" :key="t.id" :label="t.id" v-model="field.tags">{{t.name}}</el-checkbox>
          </el-form-item>

          <el-form-item label="上架">
            <el-switch v-model="field.status"></el-switch>
          </el-form-item>
          <el-form-item
            label="预览图"
            prop="thumb"
            :rules="[
              { required: true, message: '请上传课程图片' },
            ]"
          >
            <el-upload
              class="avatar-uploader"
              action="/system/upload"
              accept="image/jpeg, image/png"
              :on-success="upload"
              :on-error="uploadError"
              :show-file-list="false"
            >
              <img v-if="field.thumb" :src="field.thumb" class="avatar" />
              <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>
            <small class="text-secondary">请上传尺寸为 860x105 的图片</small>
          </el-form-item>
          <el-form-item label="推荐">
            <el-radio-group v-model="field.is_commend" class="align-baseline">
              <el-radio :label="true">是</el-radio>
              <el-radio :label="false">否</el-radio>
            </el-radio-group>
          </el-form-item>
          <el-form-item label="免费观看数量">
            <el-input type="number" v-model="field.free_num"></el-input>
          </el-form-item>
          <el-form-item label="售价">
            <el-input type="number" v-model="field.price"></el-input>
          </el-form-item>
          <el-form-item label="高清下载地址">
            <el-input v-model="field.download_address"></el-input>
          </el-form-item>
        </div>
      </div>
    </el-form>
    <div class="card mt-3">
      <div class="card-header">视频编辑</div>
      <div class="card-body" v-if="showVideoList">
        <div class="card mt-2" v-for="(video, index) in field.videos" :key="index">
          <div class="card-body">
            <el-form :model="video" label-width="100px">
              <el-form-item label="视频名称" prop="title">
                <el-input v-model="video.title" required></el-input>
              </el-form-item>
              <el-form-item label="视频地址" prop="path">
                <el-input v-model="video.path"></el-input>
              </el-form-item>
              <el-form-item label="外部播放地址" class="mb-0">
                <el-input v-model="video.external_address"></el-input>
              </el-form-item>
            </el-form>
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
      </div>
      <div class="card-footer">
        <button type="button" class="btn btn-secondary btn-sm" @click="addVideo">添加视频</button>
        <button
          type="button"
          class="btn btn-secondary btn-sm"
          @click="showVideoList = !showVideoList"
        >隐藏视频列表</button>
      </div>
    </div>
    <button type="button" class="btn btn-primary mt-2" @click="onSubmit">保存提交</button>
  </div>
</template>

<script>
import systemUpload from '@/services/upload'
export default {
  props: { field: Object, submit: Function },
  data() {
    return {
      tags: [],
      showVideoList: true
    }
  },
  async created() {
    let response = await this.axios.get(`edu/admin/tag?group=lesson`).then(r => r.data)
    this.$set(this, 'tags', response.data)
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(valid => {
        if (valid) {
          this.$emit('submit')
        } else {
          return false
        }
      })
    },
    upload(response) {
      this.$set(this.field, 'thumb', response.path)
    },
    uploadError() {
      this.$message.error('文件过大或类型不匹配')
    },
    delVideo(index) {
      this.$confirm('确定删除吗？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      })
        .then(() => {
          this.field.videos.splice(index, 1)
        })
        .catch(() => {})
    },
    addVideo() {
      this.field.videos.push({ title: '', path: '' })
    },
    insertVideo(index) {
      this.field.videos.splice(index + 1, 0, { title: '', path: '' })
    }
  }
}
</script>

<style></style>
