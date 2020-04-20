<template>
  <a-card title="修改密码" size="small">
    <a-form-model :model="form" ref="form" :label-col="{span:3}" :wrapper-col="{span:10}">
      <a-form-model-item label="原密码">
        <a-input type="password" v-model="form.origin_password" placeholder="请输入原密码"></a-input>
      </a-form-model-item>
      <a-form-model-item label="新密码">
        <a-input type="password" v-model="form.password" placeholder="请输入新密码"></a-input>
      </a-form-model-item>
      <a-form-model-item label="确认密码">
        <a-input type="password" v-model="form.password_confirmation" placeholder="请再次输入新密码"></a-input>
      </a-form-model-item>
    </a-form-model>
    <a-form-model-item :wrapper-col="{ span: 14, offset: 3 }">
      <a-button type="primary" @click="onSubmit">保存提交</a-button>
    </a-form-model-item>
  </a-card>
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
