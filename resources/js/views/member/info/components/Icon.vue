<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">
        修改头像
      </div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px" label-position="top">
          <el-form-item label="">
            <el-upload
              class="avatar-uploader"
              action="/common/upload"
              :show-file-list="false"
              accept="image/jpeg, image/png"
              :on-success="uploadSuccess"
              :on-error="uploadError"
            >
              <img v-if="this.form.avatar" :src="this.form.avatar" class="avatar" />
              <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: { form: Object },
  methods: {
    uploadSuccess(response) {
      this.$set(this.form, 'avatar', response.path)
      this.$emit('submit', ['avatar'])
    },
    uploadError() {
      this.$message.error('文件过大或类型不匹配')
    }
  }
}
</script>

<style></style>
