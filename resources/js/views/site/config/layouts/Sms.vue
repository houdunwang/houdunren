<template>
  <div>
    <div class="alert alert-warning">
      需要先将阿里云配置正确
      <br />短信模板必须包括 code 与 product 字段
    </div>
    <div class="card mt-3">
      <div class="card-header">阿里云设置</div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="120px">
          <el-form-item :label="form.sms.aliyun.sign.title">
            <el-input v-model="form.sms.aliyun.sign.value" :placeholder="form.sms.aliyun.sign.desc"></el-input>
          </el-form-item>
          <el-form-item :label="form.sms.aliyun.template.title">
            <el-input
              v-model="form.sms.aliyun.template.value"
              :placeholder="form.sms.aliyun.template.desc"
            ></el-input>
          </el-form-item>
          <el-form-item :label="form.sms.aliyun.test_mobile.title">
            <el-input
              v-model="form.sms.aliyun.test_mobile.value"
              :placeholder="form.sms.aliyun.test_mobile.desc"
            >
              <template slot="append">
                <a href="#" type="button" @click.prevent="sendTestSms">发送测试短信</a>
              </template>
            </el-input>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: { form: Object },
  methods: {
    sendTestSms() {
      this.axios.post(`site/config/sms/${this.$route.params.sid}`, {
        phone: this.form.sms.aliyun.test_mobile.value
      })
      this.$message.success('验证码发送成功')
    }
  }
}
</script>

<style scoped></style>
