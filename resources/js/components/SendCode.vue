<template>
  <div>
    <div class="form-group">
      <label>{{ title }}</label>
      <input type="text" class="form-control" :class="{ 'is-invalid': errors.account }" @focus="errors.account = ''" @keyup="$emit('update:account', value)" v-model="value" :placeholder="placeholder" />
      <strong class="form-text text-danger invalid-feedback" v-if="errors.account">{{ errors.account }}</strong>
    </div>

    <captcha :captcha.sync="captcha" ref="captcha"></captcha>

    <div class="form-group send-form">
      <label>验证码</label>
      <div class="input-group" :class="{ 'is-invalid': errors.code }" @click="errors.code = ''">
        <input type="text" class="form-control" placeholder="请输入收到的验证码" v-model="code" @keyup="$emit('update:code', code)" />
        <a href="#" class="input-group-append" @click.prevent="send">
          <span class="input-group-text" id="basic-addon2">发送验证码</span>
        </a>
      </div>
      <strong class="form-text text-danger invalid-feedback" v-if="errors.code">{{ errors.code }}</strong>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  props: {
    type: { type: String, default: 'all' },
    action: { type: String },
    title: { type: String, default: '帐号' },
    placeholder: { required: true, type: String },
  },
  data() {
    return {
      value: '',
      code: '',
      captcha: '',
    }
  },
  computed: {
    ...mapState(['errors']),
  },
  methods: {
    updateCaptcha() {
      this.$refs['captcha'].updateCaptcha()
    },
    checkAccount() {
      let msg = ''
      switch (this.type) {
        case 'all':
          const status = /.@./.test(this.value) || /^1\d{10}$/.test(this.value)
          if (status === false) {
            msg = '请输入正确的邮箱或手机号'
          }
          break
        case 'email':
          if (/.@./.test(this.value) === false) {
            msg = '邮箱格式错误'
          }
          break
        case 'mobile':
          if (/^1\d{10}$/.test(this.value) === false) {
            msg = '手机号错误'
          }
      }

      if (msg != '') {
        this.$message.error(msg)
        return false
      }
      return true
    },
    send() {
      if (this.checkAccount() === true) {
        this.updateCaptcha()
        this.axios.post(this.action, {
          account: this.value,
          captcha: this.captcha,
          code: this.code,
        })
      }
    },
  },
}
</script>

<style scoped lang="scss">
.captcha-image {
  cursor: pointer;
  img {
    height: 33px;
  }
}
</style>
