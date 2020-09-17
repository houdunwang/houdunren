<template>
  <form @submit.prevent="submit">
    <div class="card shadow">
      <div class="card-header">会员登录</div>
      <div class="card-body">
        <div class="form-group">
          <label>手机或邮箱</label>
          <input
            type="text"
            class="form-control"
            :class="{ 'is-invalid': errors.account }"
            @focus="errors.account = ''"
            v-model="account"
            placeholder="请输入登录帐号"
          />
          <strong
            class="form-text text-danger invalid-feedback"
            v-if="errors.password"
          >{{ errors.password }}</strong>
        </div>
        <div class="form-group">
          <label>密码</label>
          <input
            type="password"
            class="form-control"
            :class="{ 'is-invalid': errors.password }"
            @focus="errors.password = ''"
            v-model="password"
            placeholder="请输入登录密码"
          />
          <strong
            class="form-text text-danger invalid-feedback"
            v-if="errors.password"
          >{{ errors.password }}</strong>
        </div>
        <captcha :captcha.sync="captcha" ref="captcha"></captcha>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="remember" v-model="remember" />
            记住我
          </label>
        </div>
      </div>
      <div class="card-footer text-muted">
        <div class="d-flex justify-content-between">
          <div>
            <button type="submit" class="btn btn-success btn-sm">登录帐号</button>
          </div>
          <div class="smalla">
            <slot name="footer"></slot>
            <a href="/auth/register">注册</a>
            |
            <a href="/auth/forget">找回密码</a>
            |
            <a href="/">首页</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { mapState } from 'vuex'
export default {
  data() {
    return {
      account: '',
      password: '',
      captcha: '',
      remember: '',
    }
  },
  computed: {
    ...mapState(['errors']),
  },
  methods: {
    updateCaptcha() {
      return (this.captchaImage = '/captcha?' + Math.random())
    },
    submit() {
      this.axios
        .post('/auth/login', this.$data)
        .then((response) => {
          location.href = response
        })
        .catch(() => {
          this.$refs['captcha'].updateCaptcha()
        })
    },
  },
}
</script>

<style></style>
