<template>
  <div ref="image">
    <el-upload
      class="avatar-uploader"
      :action="action"
      :name="uploadName"
      :headers="headers"
      :show-file-list="false"
      :on-success="handleAvatarSuccess"
      :before-upload="beforeAvatarUpload"
      :with-credentials="true"
      :on-error="error"
    >
      <img v-if="imageUrl" :src="imageUrl" class="avatar" />
      <i v-else class="el-icon-plus avatar-uploader-icon"></i>
    </el-upload>

    <input :name="name" :value="imageUrl" hidden />
  </div>
</template>

<script>
export default {
  props: {
    uploadName: { default: 'file', type: String },
    name: { required: true, type: String },
    value: { default: '' },
    action: { required: true },
  },
  data() {
    return {
      imageUrl: this.value,
    }
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
      this.imageUrl = res.path
    },
    beforeAvatarUpload(file) {
      const isJPG = file.type === 'image/jpeg'
      const isLt2M = file.size / 1024 / 1024 < 2

      if (!isJPG) {
        this.$message.error('上传头像图片只能是 JPG 格式!')
      }
      if (!isLt2M) {
        this.$message.error('上传头像图片大小不能超过 2MB!')
      }
      this.$refs['image'].classList.remove('is-invalid');

      return isJPG && isLt2M
    },
    error(err) {
      this.$message.error('表单类型或大小错误')
    },
  },
}
</script>

<style>
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>
