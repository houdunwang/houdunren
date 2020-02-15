<template>
  <el-form label-width="120px" label-position="left">
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <span>邮箱配置</span>
      </div>
      <el-row>
        <el-col :span="16">
          <el-form-item :label="field.email.driver.title">
            <el-input
              v-model="field.email.driver.value"
              :placeholder="field.email.driver.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.email.host.title">
            <el-input
              v-model="field.email.host.value"
              :placeholder="field.email.host.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.email.port.title">
            <el-input
              v-model="field.email.port.value"
              :placeholder="field.email.port.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.email.username.title">
            <el-input
              v-model="field.email.username.value"
              :placeholder="field.email.username.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.email.password.title">
            <el-input
              v-model="field.email.password.value"
              :placeholder="field.email.password.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.email.name.title">
            <el-input
              v-model="field.email.name.value"
              :placeholder="field.email.name.desc"
            ></el-input>
          </el-form-item>

          <el-form-item :label="field.email.address.title">
            <el-input
              v-model="field.email.address.value"
              :placeholder="field.email.address.desc"
            ></el-input>
          </el-form-item>
        </el-col>
      </el-row>
    </el-card>

    <el-card class="box-card mt-3">
      <div slot="header" class="clearfix">
        <span>测试</span>
      </div>
      <el-row>
        <el-col :span="16">
          <el-form-item :label="field.email.test.mail.title">
            <el-input
              v-model="field.email.test.mail.value"
              :placeholder="field.email.test.mail.desc"
            >
              <template slot="append">
                <a href="">发送测试邮件</a>
              </template>
            </el-input>
          </el-form-item>
        </el-col>
      </el-row>
    </el-card>

  </el-form>
</template>

<script>
  import {mapState} from 'vuex'

  export default {
    name: "Base",
    computed: {
      ...mapState('site', {field: 'config'})
    }
  }
</script>

<style scoped>

</style>
