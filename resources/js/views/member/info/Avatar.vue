<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">
        修改头像2
      </div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px" label-position="top">
          <el-form-item label="">
            <el-upload
              class="avatar-uploader"
              action="/common/upload/avatar"
              :show-file-list="false"
              accept="image/jpeg, image/png"
              :on-success="uploadSuccess"
              :on-error="uploadError"
            >
              <img v-if="form.avatar" :src="form.avatar" class="avatar" />
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
  data() {
    return {
      form: {}
    }
  },
  async created() {
    let response = await this.axios.get(`member/get`)
    this.$set(this.form, 'avatar', response.data.avatar)
  },
  methods: {
    async uploadSuccess(response) {
      await this.$set(this.form, 'avatar', response.path)
      await this.axios.put(`member/user`, this.form)
      this.$message.success('修改成功')
      window.location.reload(true)
    },
    uploadError() {
      this.$message.error('文件过大或类型不匹配')
    }
  }
}
</script>

<style></style>
