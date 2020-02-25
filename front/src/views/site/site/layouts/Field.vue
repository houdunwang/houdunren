<template>
  <div>
    <nav class="nav nav-tabs mb-3">
      <router-link class="nav-link" :to="{ name: 'site.index' }">
        <i class="fa fa-home" aria-hidden="true"></i>
      </router-link>
      <a class="nav-link active" href="#">编辑站点</a>
    </nav>
    <div class="card">
      <div class="card-body">
        <el-form ref="form" label-width="100px" :rules="rules" :model="field" label-position="right">
          <el-form-item label="站点名称" prop="name">
            <el-input v-model="field.name" placeholder="请输入网站标题"></el-input>
          </el-form-item>

          <el-form-item label="网站域名" prop="domain">
            <el-input v-model="field.domain" placeholder="如: https://www.github.com"></el-input>
          </el-form-item>

          <el-form-item label="网站描述" prop="description">
            <el-input type="textarea" rows="3" v-model="field.description" placeholder="网站的简短介绍"></el-input>
          </el-form-item>

          <el-form-item label="关键词">
            <el-input v-model="field.keyword" placeholder="请用半角逗号分隔"></el-input>
          </el-form-item>

          <el-form-item label="站点标志">
            <el-upload class="avatar-uploader" :action="uploadUrl" accept="image/jpeg, image/png" :show-file-list="false" :on-success="logoUpload" :headers="headers">
              <img v-if="field.logo" :src="field.logo" class="avatar" />
              <i v-else class="el-icon-plus avatar-uploader-icon"></i>
            </el-upload>
          </el-form-item>

          <el-form-item label="ICP备案号">
            <el-input v-model="field.icp"></el-input>
          </el-form-item>

          <el-form-item label="电话">
            <el-input v-model="field.tel"></el-input>
          </el-form-item>

          <el-form-item label="邮箱">
            <el-input v-model="field.email"></el-input>
          </el-form-item>

          <el-form-item label="统计代码">
            <el-input type="textarea" :rows="4" v-model="field.counter" placeholder></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click.prevent="submit('form')">保存提交</el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
import token from '@/services/token'

export default {
  props: ['action'],
  data() {
    return {
      field: {
        activeName: 'base',
        name: '',
        keyword: '',
        description: '',
        logo: '',
        icp: '',
        domain: '',
        tel: '',
        email: '',
        counter: ''
      },
      rules: {
        name: [
          { required: true, message: '站点名称不能为空', trigger: 'blur' },
          { min: 3, max: 25, message: '长度在 3 到 5 个字符', trigger: 'blur' }
        ],
        domain: [{ required: true, message: '域名不能为空', trigger: 'blur' }]
      }
    }
  },
  async created() {
    if (this.action === 'edit') {
      let response = await this.axios.get(`/site/site/${this.$route.params.sid}`).then(r => r.data.data)
      this.$set(this, 'field', response)
    }
  },
  computed: {
    uploadUrl() {
      return `${process.env.VUE_APP_API_URL}system/upload`
    },
    //文件上传头信息
    headers() {
      return {
        Authorization: `Bearer ${token.get()}`
      }
    }
  },
  methods: {
    //上传标志
    logoUpload(res) {
      this.field.logo = res
    },
    submit(ref) {
      this.$refs[ref].validate(async valid => {
        if (valid) {
          switch (this.action) {
            case 'add':
              await this.axios.post(`/site/site`, this.field)
              this.$message.success('添加成功')
              this.$router.push('/site/index')
              break
            case 'edit':
              await this.axios.put(`/site/site/${this.field.id}`, this.field)
              this.$message.success('更新成功')
              this.$router.push('/site/index')
              break
          }
        } else {
          return false
        }
      })
    }
  }
}
</script>

<style></style>
