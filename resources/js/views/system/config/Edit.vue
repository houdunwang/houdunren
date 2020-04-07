<template>
  <div>
    <div>
      <a-tabs defaultActiveKey="1">
        <a-tab-pane tab="系统配置" key="1">
          <a-form v-model="form" labelAlign="right" :label-col="{ span: 2 }" :wrapper-col="{ span: 8 }">
            <a-form-item :label="form.base.name.title">
              <a-input v-model="form.base.name.value"></a-input>
            </a-form-item>
            <a-form-item :label="form.base.logo.title">
              <a-upload
                name="file"
                listType="picture-card"
                class="avatar-uploader"
                :showUploadList="false"
                action="/api/common/upload"
                @change="handleChange"
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
    <!-- <el-form ref="form" label-width="100px" :model="form">
      <div class="card">
        <div class="card-body">
          <el-form <el-form-item label="后台名称">
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
    </el-form>-->
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import { system as systemUpload } from '@/services/upload'
export default {
  computed: {
    ...mapState('system', { form: 'config' }),
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
      this.$success({
        title: '温馨提示',
        content: '修改成功',
        maskClosable: true,
      })
    },
  },
}
</script>
