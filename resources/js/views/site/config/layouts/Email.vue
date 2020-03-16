<template>
  <div>
    <div class="alert alert-warning">使用阿里云邮件服务需要先先配置阿里云</div>
    <el-form :model="form" ref="form" label-width="120px" label-position="left">
      <div class="card">
        <div class="card-header">邮箱配置</div>
        <div class="card-body">
          <el-form-item :label="form.email.driver.title">
            <el-input v-model="form.email.driver.value" :placeholder="form.email.driver.desc"></el-input>
          </el-form-item>
          <el-form-item :label="form.email.host.title">
            <el-input v-model="form.email.host.value" :placeholder="form.email.host.desc"></el-input>
          </el-form-item>
          <el-form-item :label="form.email.port.title">
            <el-input v-model="form.email.port.value" :placeholder="form.email.port.desc"></el-input>
          </el-form-item>
          <el-form-item :label="form.email.username.title">
            <el-input v-model="form.email.username.value" :placeholder="form.email.username.desc"></el-input>
          </el-form-item>
          <el-form-item :label="form.email.password.title">
            <el-input v-model="form.email.password.value" :placeholder="form.email.password.desc"></el-input>
          </el-form-item>
          <el-form-item :label="form.email.encryption.title">
            <el-radio-group v-model="form.email.encryption.value">
              <el-radio label="tls"></el-radio>
              <el-radio label="ssl"></el-radio>
            </el-radio-group>
          </el-form-item>
        </div>
      </div>
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
  </div>
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
