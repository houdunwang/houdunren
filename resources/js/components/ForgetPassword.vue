<template>
  <form action @submit.prevent="onSubmit">
    <div class="card shadow">
      <div class="card-header">找回密码</div>
      <div class="card-body">
        <send-code
          type="all"
          placeholder="请输入登录帐号"
          :code.sync="code"
          action="/auth/forget/code"
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

        <div class="form-group">
          <label>确认密码</label>
          <input
            type="password"
            class="form-control"
            :class="{ 'is-invalid': errors.password_confirmation }"
            @focus="errors.password_confirmation = ''"
            v-model="password_confirmation"
          />
          <strong
            class="form-text text-danger invalid-feedback"
            v-if="errors.password_confirmation"
          >{{ errors.password_confirmation }}</strong>
        </div>
      </div>
      <div class="card-footer text-muted d-flex justify-content-between">
        <button class="btn btn-success btn-sm">找回密码</button>
        <div>
          <a href="/auth/login">登录</a>
          |
          <a href="/auth/register">注册</a>
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
      password_confirmation: '',
    }
  },
  computed: {
    ...mapState(['errors']),
  },
  methods: {
    onSubmit() {
      this.axios.post('/auth/forget', this.$data).then((response) => {
        location.href = '/'
      })
    },
  },
}
</script>
<style scoped lang="scss"></style>
