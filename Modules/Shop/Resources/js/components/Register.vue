<template>
  <div class="card shadow">
    <div class="card-header">会员注册</div>
    <div class="card-body">
      <div class="form-group">
        <label>手机号</label>
        <input
          type="text"
          class="form-control"
          :class="{ 'is-invalid': errors.mobile }"
          @change="errors.mobile = ''"
          v-model="mobile"
          placeholder="请输入手机号码"
        />
        <strong
          class="form-text text-danger invalid-feedback"
          v-if="errors.mobile"
        >{{ errors.mobile }}</strong>
      </div>

      <div class="form-group captcha">
        <label>图形验证码</label>
        <div class="input-group" :class="{ 'is-invalid': errors.captcha }">
          <input
            type="text"
            class="form-control"
            placeholder="请输入右侧图形验证码"
            @change="errors.captcha = ''"
            v-model="captcha"
          />
          <div class="input-group-append border captcha-box" @click="updateCaptcha">
            <img :src="captchaImage" />
          </div>
        </div>
        <strong
          class="form-text text-danger invalid-feedback"
          v-if="errors.captcha"
        >{{ errors.captcha }}</strong>
      </div>

      <div class="form-group send-form">
        <label>验证码</label>
        <div class="input-group" :class="{ 'is-invalid': errors.code }">
          <input type="text" class="form-control" placeholder="请输入手机验证码" v-model="code" />
          <div class="input-group-append" @click="send">
            <span class="input-group-text" id="basic-addon2">发送验证码</span>
          </div>
        </div>
        <strong class="form-text text-danger invalid-feedback" v-if="errors.code">{{ errors.code }}</strong>
      </div>

      <el-divider>
        <i class="el-icon-mobile-phone"></i>
      </el-divider>

      <div class="form-group">
        <label>密码</label>
        <input
          type="password"
          class="form-control"
          :class="{ 'is-invalid': errors.password }"
          @change="errors.password = ''"
          v-model="password"
          placeholder="密码"
        />
        <strong
          class="form-text text-danger invalid-feedback"
          v-if="errors.password"
        >{{ errors.password }}</strong>
      </div>

      <div class="form-group">
        <label>确认密码</label>
        <input
          type="password"
          class="form-control"
          v-model="password_confirmation"
          placeholder="确认密码"
        />
      </div>
    </div>

    <div class="card-footer text-muted d-flex justify-content-between">
      <a href="/" class="btn btn-success btn-sm" @click.prevent="onSubmit">注册</a>
      <div>
        <a href="/login">登录</a> |
        <a href="/find/password">找回密码</a>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from 'vuex'
export default {
  data() {
    return {
      name: '',
      mobile: '',
      code: '',
      captcha: '',
      password: '',
      password_confirmation: '',
      captchaImage: '/captcha'
    }
  },
  computed: {
    ...mapState(['errors'])
  },
  methods: {
    updateCaptcha() {
      return (this.captchaImage = '/captcha?' + Math.random())
    },
    send() {
      this.axios.post(`/register/code`, this.$data)
      this.updateCaptcha()
    },
    async onSubmit() {
      await this.axios.post(`/register`, this.$data)
      location.href = '/'
    }
  }
}
</script>
<style scoped lang="scss">
.send-form {
  .input-group-append {
    cursor: pointer;
  }
}
.captcha {
  cursor: pointer;
}
</style>
