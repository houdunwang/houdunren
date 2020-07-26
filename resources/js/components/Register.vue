<template>
  <form action @submit.prevent="onSubmit">
    <div class="card shadow">
      <div class="card-header">会员注册</div>
      <div class="card-body">
        <send-code name="account" type="mobile" :account.sync="account" :code.sync="code" action="/register/code" ref="sendCode" title="手机号" placeholder="请输入手机号码"></send-code>

        <hr />
        <div class="form-group">
          <label>密码</label>
          <input type="password" class="form-control" :class="{ 'is-invalid': errors.password }" @focus="errors.password = ''" v-model="password" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.password">{{ errors.password }}</strong>
        </div>

        <div class="form-group">
          <label>确认密码</label>
          <input type="password" class="form-control" :class="{ 'is-invalid': errors.password_confirmation }" @focus="errors.password_confirmation = ''" v-model="password_confirmation" />
          <strong class="form-text text-danger invalid-feedback" v-if="errors.password_confirmation">{{ errors.password_confirmation }}</strong>
        </div>
      </div>
      <div class="card-footer text-muted d-flex justify-content-between">
        <button class="btn btn-success btn-sm">登录帐号</button>
        <div>
          <a href="/login">登录</a>
          |
          <a href="/forget">找回密码</a>
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
      this.axios.post('/register', this.$data).then((response) => {
        location.href = response.url
      })
    },
  },
}
</script>
<style scoped lang="scss"></style>
