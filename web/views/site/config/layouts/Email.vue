<template>
  <a-form-model :model="form" :label-col="{ span: 4 }" :wrapper-col="{ span: 10 }">
    <a-alert message="使用阿里云邮件服务需要先先配置阿里云" type="success" class="mb-2" />
    <a-card size="small" hoverable title="邮箱配置">
      <a-form-model-item :label="form.email.driver.title">
        <a-input v-model="form.email.driver.value" :placeholder="form.email.driver.title" />
      </a-form-model-item>
      <a-form-model-item :label="form.email.host.title">
        <a-input v-model="form.email.host.value" :placeholder="form.email.host.title" />
      </a-form-model-item>
      <a-form-model-item :label="form.email.port.title">
        <a-input v-model="form.email.port.value" :placeholder="form.email.port.title" />
      </a-form-model-item>
      <a-form-model-item :label="form.email.username.title">
        <a-input v-model="form.email.username.value" :placeholder="form.email.username.title" />
      </a-form-model-item>
      <a-form-model-item :label="form.email.password.title">
        <a-input v-model="form.email.password.value" :placeholder="form.email.password.title" />
      </a-form-model-item>
      <a-form-model-item :label="form.email.encryption.title">
        <a-radio-group v-model="form.email.encryption.value">
          <a-radio value="tls">tls</a-radio>
          <a-radio value="ssl">ssl</a-radio>
        </a-radio-group>
      </a-form-model-item>
    </a-card>
    <a-card size="small" hoverable title="测试邮箱" class="mt-3">
      <a-form-model-item :label="form.email.password.title">
        <a-input-search placeholder="form.email.password.value" @search="send" size="large">
          <a-button slot="enterButton">发送测试邮件</a-button>
        </a-input-search>
      </a-form-model-item>
    </a-card>
  </a-form-model>
  <!-- <div>
    <div class="alert alert-warning">使用阿里云邮件服务需要先先配置阿里云</div>
    <el-form :model="form" ref="form" label-width="120px" label-position="left">
      <div class="card mt-3">
        <div class="card-header">测试</div>
        <div class="card-body">
          <el-form-item :label="form.email.test_mail.title">
            <el-input v-model="form.email.test_mail.value" :placeholder="form.email.test_mail.desc">
              <template slot="append">
                <a href="#" @click.prevent="send">发送测试邮件</a>
              </template>
            </el-input>
          </el-form-item>
        </div>
      </div>
    </el-form>
  </div> -->
</template>
<script>
export default {
  props: { form: Object },
  methods: {
    async send() {
      await this.axios.post(`site/config/email/${this.$route.params.sid}`, {
        phone: this.form.email.test_mail.value
      })
      this.$message.success('测试邮件发送成功')
    }
  }
}
</script>

<style scoped></style>
