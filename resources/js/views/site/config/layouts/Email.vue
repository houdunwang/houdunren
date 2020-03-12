<template>
  <el-form :model="form" ref="form" label-width="120px" label-position="left">
    <div class="card">
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

        <el-form-item :label="form.email.name.title">
          <el-input v-model="form.email.name.value" :placeholder="form.email.name.desc"></el-input>
        </el-form-item>

        <el-form-item :label="form.email.address.title">
          <el-input v-model="form.email.address.value" :placeholder="form.email.address.desc"></el-input>
        </el-form-item>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header">测试</div>
      <div class="card-body">
        <el-form-item :label="form.email.test.mail.title">
          <el-input v-model="form.email.test.mail.value" :placeholder="form.email.test.mail.desc">
            <template slot="append">
              <a href>发送测试邮件</a>
            </template>
          </el-input>
        </el-form-item>
      </div>
    </div>
  </el-form>
</template>

<script>
export default {
  props: { form: Object }
}
</script>

<style scoped></style>
