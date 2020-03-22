<template>
  <form class="logins">
    <div class="card bg-white animated fadeInDownBig" id="app">
      <div class="card-header">登录帐号</div>
      <div class="card-body">
        <div class="form-group">
          <label for="username">用户名</label>
          <input
            type="text"
            class="form-control"
            id="username"
            v-model="form.username"
            placeholder="用户名/手机号/邮箱"
          />
        </div>
        <div class="form-group">
          <label for="password">密码</label>
          <input
            type="password"
            class="form-control"
            v-model="form.password"
            autocomplete="false"
            id="password"
            placeholder="请输入登录密码"
          />
        </div>
        <div class="form-group">
          <label for="code">验证码</label>
          <div class="input-group">
            <input
              type="text"
              v-model="form.code"
              id="code"
              class="form-control"
              placeholder="请输入验证码"
            />
            <div class="input-group-append">
              <captcha />
            </div>
          </div>
        </div>
        <div class="text-secondary">
          <a href class="mr-2">
            <i class="fa fa-user-o" aria-hidden="true"></i> 注册
          </a>
          <a href>
            <i class="fa fa-circle-o-notch" aria-hidden="true"></i> 忘记密码
          </a>
        </div>
      </div>
      <div class="card-footer text-muted">
        <button type="submit" class="btn btn-primary" @click.prevent="submit">登录</button>
      </div>
    </div>
  </form>
</template>
<script>
import { mapActions } from 'vuex'
import Captcha from '@/components/Captcha'
export default {
  components: { Captcha },
  data() {
    return {
      form: { username: '', password: '', code: '', remember: false, captcha: {} }
    }
  },
  methods: {
    ...mapActions('user', ['login']),
    async submit() {
      await this.login(this.form)
      let url = this.$route.query.redirect || '/'
      location.href = url
    }
  }
}
</script>

<style lang="scss" >
</style>
