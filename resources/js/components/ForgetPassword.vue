<template>
  <form action @submit.prevent="onSubmit">
    <div class="card shadow">
      <div class="card-header">找回密码</div>
      <div class="card-body">
        <send-code
          name="account"
          placeholder="请输入登录帐号"
          :code.sync="code"
          action="/forget/code"
          ref="sendCode"
          :account.sync="account"
        ></send-code>
        <hr />
        <div class="form-group">
          <label>密码</label>
          <input
            type="password"
            class="form-control"
            :class="{ 'is-invalid': errors.password }"
            @focus="errors.password = ''"
            v-model="password"
          />
          <strong
            class="form-text text-danger invalid-feedback"
            v-if="errors.password"
          >{{ errors.password }}</strong>
        </div>
      </div>
      <div class="card-footer text-muted d-flex justify-content-between">
        <button class="btn btn-success btn-sm">登录帐号</button>
        <div>
          <a href="/login">登录</a>
          |
          <a href="/register">注册</a>
          |
          <a href="/">网站首页</a>
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
      code: '',
      password: '',
    }
  },
  computed: {
    ...mapState(['errors']),
  },
  methods: {
    onSubmit() {
      this.$refs.sendCode.updateCaptcha()
      this.axios.post('/forget', this.$data).then((response) => {
        // location.href = response.url
      })
    },
  },
}
</script>
<style scoped lang="scss"></style>
