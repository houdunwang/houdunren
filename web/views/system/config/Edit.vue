<template>
  <div>
    <div>
      <a-tabs defaultActiveKey="1">
        <a-tab-pane tab="系统配置" key="1">
          <a-form
            v-model="form"
            labelAlign="right"
            :label-col="{ span: 2 }"
            :wrapper-col="{ span: 8 }"
          >
            <a-form-item :label="form.base.name.title">
              <a-input v-model="form.base.name.value"></a-input>
            </a-form-item>
            <a-form-item :label="form.base.logo.title">
              <a-upload
                name="file"
                listType="picture-card"
                class="avatar-uploader"
                :showUploadList="false"
                action="/api/common/upload/system"
                @change="handleChange"
                :headers="headers"
              >
                <img v-if="form.base.logo.value" :src="form.base.logo.value" alt="avatar" />
                <div v-else>
                  <div class="ant-upload-text">选择图片</div>
                </div>
              </a-upload>
            </a-form-item>
            <a-form-item :label="form.base.footer.title">
              <a-input type="textarea" rows="3" v-model="form.base.footer.value"></a-input>
            </a-form-item>
            <a-form-model-item :wrapper-col="{ span: 10, offset: 2 }">
              <a-button type="primary" @click="onSubmit">保存提交</a-button>
            </a-form-model-item>
          </a-form>
        </a-tab-pane>
      </a-tabs>
    </div>
  </div>
</template>

<script>
import token from '@/services/token'
import { mapState, mapActions } from 'vuex'
export default {
  computed: {
    ...mapState('system', { form: 'config' })
  },
  data() {
    return {
      headers: token.headers()
    }
  },
  methods: {
    ...mapActions('system', { getConfig: 'getConfig' }),
    //标志上传
    handleChange(info) {
      const status = info.file.status
      if (status === 'done') {
        this.$set(this.form.base.logo, 'value', info.file.response.path)
      }
    },
    async onSubmit() {
      await this.axios.post('system/config', this.form)
      await this.getConfig()
      document.title = this.form.base.name.value
      this.$message.success('修改成功')
    }
  }
}
</script>
