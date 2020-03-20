<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">我的资料</div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px">
          <el-form-item
            label="昵称"
            prop="nickname"
            :rules="[{ required: true, message: '昵称不能为空', trigger: 'blur' }]"
          >
            <el-input v-model="form.nickname"></el-input>
          </el-form-item>
          <el-form-item label="真实姓名">
            <el-input v-model="form.real_name"></el-input>
          </el-form-item>
          <el-form-item label="个人网站">
            <el-input v-model="form.home"></el-input>
          </el-form-item>
          <el-form-item label="微博帐号">
            <el-input v-model="form.weibo"></el-input>
          </el-form-item>
          <el-form-item label="微信号">
            <el-input v-model="form.wechat"></el-input>
          </el-form-item>
          <el-form-item label="GitHub">
            <el-input v-model="form.github"></el-input>
          </el-form-item>
          <el-form-item label="QQ">
            <el-input v-model="form.qq"></el-input>
          </el-form-item>
          <el-form-item label="WakaTime">
            <el-input v-model="form.wakatime"></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">保存提交</el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
import _ from 'lodash'
export default {
  data() {
    return {
      form: {}
    }
  },
  async created() {
    let response = await this.axios
      .get(`member/get`)
      .then(r => _.pick(r.data, ['nickname', 'real_name', 'home', 'weibo', 'wechat', 'github', 'qq']))
    this.$set(this, 'form', response)
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/user`, this.form)
          this.$message.success('修改成功')
          window.location.reload()
        }
      })
    }
  }
}
</script>

<style></style>
