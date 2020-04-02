<template>
  <div>
    <div class="card">
      <div class="card-header bg-white">
        修改密码
      </div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="80px">
          <el-form-item
            label="原密码"
            prop="origin_password"
            :rules="[{ required: true, message: '请输入原密码', trigger: 'blur' }]"
          >
            <el-input type="password" v-model="form.origin_password"></el-input>
          </el-form-item>
          <el-form-item
            label="密码"
            prop="password"
            :rules="[{ required: true, message: '请输入密码', trigger: 'blur' }]"
          >
            <el-input type="password" v-model="form.password"></el-input>
          </el-form-item>
          <el-form-item
            label="确认密码"
            prop="password_confirmation"
            :rules="[{ required: true, message: '确认密码不能为空', trigger: 'blur' }]"
          >
            <el-input type="password" v-model="form.password_confirmation"></el-input>
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
  methods: {
    onSubmit() {
      this.$refs['form'].validate(async valid => {
        if (valid) {
          await this.axios.put(`member/password`, this.form)
          this.$message.success('密码修改成功')
        }
      })
    }
  }
}
</script>

<style></style>
