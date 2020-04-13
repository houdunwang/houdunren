<template>
  <a-form-model :model="form" :label-col="{ span: 3 }" :wrapper-col="{ span: 12 }">
    <a-alert
      message="需要先将阿里云配置正确
      ，短信模板必须包括 code 与 product 字段"
      type="success"
      class="mb-2"
    />

    <a-card title="阿里云设置" size="small" hoverable>
      <a-form-model-item :label="form.sms.aliyun.sign.title">
        <a-input v-model="form.sms.aliyun.sign.value" :placeholder="form.sms.aliyun.sign.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.sms.aliyun.template.title">
        <a-input v-model="form.sms.aliyun.template.value" :placeholder="form.sms.aliyun.template.desc" />
      </a-form-model-item>
      <a-form-model-item :label="form.sms.aliyun.test_mobile.title">
        <a-input-search :placeholder="form.sms.aliyun.test_mobile.desc" @search="sendTestSms">
          <a-button slot="enterButton">发送测试短信</a-button>
        </a-input-search>
      </a-form-model-item>
    </a-card>
  </a-form-model>
</template>

<script>
export default {
  props: { form: Object },
  methods: {
    async sendTestSms() {
      await this.axios.post(`site/config/sms/${this.$route.params.sid}`, {
        phone: this.form.sms.aliyun.test_mobile.value
      })
      // this.$confirm({
      //   title: '温馨提示',
      //   content: '验证码发送成功',
      //   okText: '确认',
      //   cancelText: '取消'
      // })
      this.$message.success('验证码发送成功')
    }
  }
}
</script>

<style scoped></style>
