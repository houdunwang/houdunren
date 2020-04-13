<template>
  <div>
    <nav class="nav nav-tabs mb-3">
      <router-link class="nav-link" :to="{ name: 'site' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">编辑站点</a>
    </nav>
    <div class="card">
      <div class="card-body">
        <a-form-model
          :model="form"
          :label-col="{ span: 3 }"
          :wrapper-col="{ span: 10 }"
          :rules="rules"
          ref="form"
        >
          <a-form-model-item label="站点名称" prop="name">
            <a-input v-model="form.name" placeholder="请输入网站标题" />
          </a-form-model-item>
          <a-form-model-item label="网站域名" prop="domain">
            <a-input v-model="form.domain" placeholder="如: https://www.github.com" />
          </a-form-model-item>
          <a-form-model-item label="网站描述">
            <a-input type="textarea" v-model="form.description" placeholder="网站的简短介绍" />
          </a-form-model-item>
          <a-form-model-item label="关键词">
            <a-input v-model="form.keyword" placeholder="请用半角逗号分隔" />
          </a-form-model-item>
          <a-form-model-item label="网站标志">
            <a-upload
              name="file"
              listType="picture-card"
              class="avatar-uploader"
              :showUploadList="false"
              :action="`/api/common/upload/system`"
              @change="logoUpload"
            >
              <img v-if="form.logo" :src="form.logo" alt="avatar" />
              <div v-else>
                <div class="ant-upload-text">
                  <i class="fa fa-file-image-o fa-4x" aria-hidden="true"></i>
                </div>
              </div>
            </a-upload>
          </a-form-model-item>
          <a-form-model-item label="ICP备案号">
            <a-input v-model="form.icp" />
          </a-form-model-item>
          <a-form-model-item label="电话">
            <a-input v-model="form.tel" />
          </a-form-model-item>
          <a-form-model-item label="邮箱">
            <a-input v-model="form.email" />
          </a-form-model-item>
          <a-form-model-item label="统计代码">
            <a-input type="textarea" v-model="form.counter" />
          </a-form-model-item>
          <a-form-model-item :wrapper-col="{ span: 3, offset: 3 }">
            <a-button type="primary" @click="onSubmit">保存提交</a-button>
          </a-form-model-item>
        </a-form-model>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    action: String,
    method: { type: String, default: 'post' },
    form: {
      type: Object,
      default: () => {
        return {
          name: '',
          keyword: '',
          description: '',
          logo: '',
          icp: '',
          domain: '',
          tel: '',
          email: '',
          counter: ''
        }
      }
    }
  },
  data() {
    return {
      rules: {
        name: [
          { required: true, message: '站点名称不能为空', trigger: 'blur' },
          { min: 3, max: 25, message: '长度在 3 到 5 个字符', trigger: 'blur' }
        ],
        domain: [{ required: true, message: '域名不能为空', trigger: 'blur' }]
      }
    }
  },
  methods: {
    //上传标志
    logoUpload(response) {
      if (response.file.status === 'done') {
        this.form.logo = response.file.response.path
      }
    },
    onSubmit(ref) {
      this.$refs.form.validate(async valid => {
        if (valid) {
          await this.axios[this.method](this.action, this.form)
          this.$message.success('保存成功')
          this.$router.push({ name: 'site.index' })
        }
      })
    }
  }
}
</script>
