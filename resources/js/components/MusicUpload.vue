<template>
  <div ref="image">
    <el-upload class="avatar-uploader" :action="action" :name="uploadName" :headers="headers" :show-file-list="false" :on-success="handleAvatarSuccess" :before-upload="beforeAvatarUpload" :with-credentials="true" :on-error="error">
      <div v-if="url" class="d-flex flex-column">
        <audio controls>
          <source :src="url" type="audio/mp3" />
        </audio>
        <button class="btn btn-sm btn-secondary">重新上传</button>
      </div>
      <i v-else class="el-icon-plus avatar-uploader-icon"></i>
    </el-upload>
    <input :name="name" :value="url" hidden />
  </div>
</template>

<script>
export default {
  props: {
    uploadName: { default: 'file', type: String },
    name: { type: String, default: 'file' },
    value: { type: String, default: '' },
    action: { default: '/common/upload/make' },
  },
  data() {
    return {
      url: '',
    }
  },
  watch: {
    value: {
      handler(n, o) {
        this.url = n
      },
      immediate: true,
    },
  },
  computed: {
    headers() {
      return {
        'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").content,
        Accept: 'application/json',
      }
    },
  },
  methods: {
    handleAvatarSuccess(res, file) {
      this.url = res.path
      this.$emit('update:value', this.url)
    },
    beforeAvatarUpload(file) {
      const isJPG = ['audio/mpeg'].some((mime) => mime == file.type)
      const isLt2M = file.size / 1024 / 1024 < 2
      if (!isJPG) {
        this.$message.error('请上传MP3类型的音频')
      }
      if (!isLt2M) {
        this.$message.error('文件大小不能超过 2MB!')
      }
      this.$refs['image'].classList.remove('is-invalid')

      return isJPG && isLt2M
    },
    error(err) {
      this.$message.error('图片过大或尺寸，类型错误')
    },
  },
}
</script>

<style lang="scss">
audio {
  background-color: #f3f3f3;
}

.avatar-uploader {
  .el-upload {
    border: 1px solid #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    &:hover {
      border-color: #409eff;
    }
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
}

.avatar {
  min-height: 100px;
  max-height: 200px;
  display: block;
}
</style>
