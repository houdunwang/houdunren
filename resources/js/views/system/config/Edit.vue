<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'system' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link class="nav-link active" :to="{ name: 'system.package' }">系统配置</router-link>
    </nav>

    <el-form ref="form" label-width="100px" :model="form">
      <div class="card">
        <div class="card-body">
          <el-form-item label="后台名称">
            <el-input placeholder="用于在浏览器标签中显示的名称" v-model="form.base.name.value"></el-input>
          </el-form-item>
          <el-form-item label="后台标志">
            <el-upload
              class="avatar-uploader"
              action="/common/upload"
              accept="image/jpeg, image/png"
              :on-success="upload"
              :on-error="uploadError"
              :show-file-list="false"
            >
              <img v-if="form.base.logo.value" :src="form.base.logo.value" class="avatar" />
              <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>
            <small class="text-secondary">请上传尺寸为 860x105 的PNG图片</small>
          </el-form-item>
          <el-form-item label="后台页脚">
            <el-input
              type="textarea"
              :rows="4"
              v-model="form.base.footer.value"
              placeholder="在后面底部显示的内容"
            ></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="submit">保存提交</el-button>
          </el-form-item>
        </div>
      </div>
    </el-form>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import { system as systemUpload } from '@/services/upload'
export default {
  computed: {
    ...mapState('systemConfig', { form: 'data' })
  },
  methods: {
    ...mapActions('systemConfig', { getConfig: 'get' }),
    //标志上传
    upload(response) {
      this.$set(this.form.base.logo, 'value', response.path)
    },
    uploadError() {
      this.$message.error('文件过大或类型不匹配')
    },
    async submit() {
      await this.axios.post('system/config', this.form)
      await this.getConfig()
      document.title = this.form.base.name.value
      this.$message.success('更新成功')
    }
  }
}
</script>
