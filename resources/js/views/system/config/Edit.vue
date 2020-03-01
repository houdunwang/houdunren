<template>
  <div>
    <nav class="nav nav-tabs mb-2">
      <router-link class="nav-link" :to="{ name: 'system' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <router-link class="nav-link active" :to="{ name: 'system.package' }">系统配置</router-link>
    </nav>

    <el-form ref="form" label-width="100px" :model="setting">
      <div class="card">
        <div class="card-body">
          <el-form-item label="后台名称">
            <el-input placeholder="用于在浏览器标签中显示的名称" v-model="setting.base.name.value"></el-input>
          </el-form-item>
          <el-form-item label="后台标志">
            <el-upload
              class="avatar-uploader"
              action="/api/system/upload"
              accept="image/jpeg, image/png"
              :show-file-list="false"
              :http-request="upload"
            >
              <img v-if="setting.base.logo.value" :src="setting.base.logo.value" class="avatar" />
              <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>
          </el-form-item>
          <el-form-item label="后台页脚">
            <el-input
              type="textarea"
              :rows="4"
              v-model="setting.base.footer.value"
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
    ...mapState('systemConfig', { setting: 'data' })
  },
  methods: {
    ...mapActions('systemConfig', { getConfig: 'get' }),
    //标志上传
    upload(param) {
      systemUpload(param.file).then(response => {
        this.$set(this.setting.base.logo, 'value', response.data)
      })
    },
    async submit() {
      await this.axios.post('system/config', { data: this.setting })
      await this.getConfig()
      this.$message.success('更新成功')
    }
  }
}
</script>
