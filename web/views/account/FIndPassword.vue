<template>
  <a-card title="找回密码" class="account shadow-sm animated fadeInDown">
    <a-form-model layout="vertical" :model="form" :rules="rules" ref="form">
      <a-form-model-item label="帐号" prop="account">
        <a-input v-model="form.account" placeholder="请输入邮箱或手机号" @blur="checkAccount" />
      </a-form-model-item>
      <a-form-model-item label="验证码" prop="code">
        <send-code :code.sync="form.code" :account.sync="form.account" :state="has" />
      </a-form-model-item>
      <a-form-model-item label="新密码" prop="password">
        <a-input type="password" v-model="form.password" placeholder="请输入登录密码" />
      </a-form-model-item>
      <a-form-model-item label="确认密码" prop="password_confirmation">
        <a-input type="password" v-model="form.password_confirmation" placeholder="请输入确认密码" />
      </a-form-model-item>
      <a-form-model-item label="验证码" prop="captcha" class="captcha">
        <a-input placeholder="请输入图形验证码" v-model="form.captcha">
          <a-tooltip slot="suffix">
            <img src="/api/common/captcha/image" onclick="this.src=this.src+`?${Math.random()}`" />
          </a-tooltip>
        </a-input>
      </a-form-model-item>
      <a-form-model-item type="flex">
        <a-row type="flex" justify="space-between" align="middle">
          <div>
            <a-button type="primary" @click="onSubmit" style="margin-left: 10px;">修改密码</a-button>
          </div>
          <div>
            <router-link :to="{ name: 'login' }" class="text-secondary mr-1">登录</router-link>
            <router-link :to="{ name: 'register' }" href class="text-secondary">注册</router-link>
          </div>
        </a-row>
      </a-form-model-item>
    </a-form-model>
  </a-card>
</template>

<script>
import { mapGetters } from 'vuex'
import store from '@/store'
import router from '@/router'
import SendCode from '@/components/SendCode'
const rules = {
  account: [{ required: true, message: '帐号不能为空', trigger: 'blur' }],
  code: [{ required: true, message: '验证码输入错误', trigger: 'blur' }],
  password: [{ required: true, message: '密码不能为空', trigger: 'blur' }],
  password_confirmation: [{ required: true, message: '确认密码不能为空', trigger: 'blur' }],
  captcha: [{ required: true, message: '验证码不能为空' }]
}
const form = {
  account: '',
  code: '',
  captcha: '',
  password: '',
  password_confirmation: ''
}
export default {
  components: { SendCode },
  data() {
    return {
      rules,
      form,
      site: null,
      has: false
    }
  },
  computed: {
    ...mapGetters('user', ['isLogin'])
  },
  methods: {
    async checkAccount() {
      let response = await this.$axios.post(`account/has`, this.form)
      this.$set(this, 'has', response.data.state)
      if (this.has === false) {
        this.$message.warning('帐号不存在')
      }
    },
    onSubmit() {
      this.$refs.form.validate(valid => {
        if (valid) {
          this.$axios.post('account/findPassword', this.form).then(response => {
            this.$message.success('密码修改成功')
            this.$router.push({ name: 'login' })
          })
        }
      })
    }
  }
}
</script>
<style lang="scss">
.account {
  width: 450px;
  @media screen and (max-width: 768px) {
    width: 98%;
  }
  .captcha {
    .ant-input-suffix {
      right: 0;
      height: 100%;
      img {
        height: 100%;
        cursor: pointer;
        border: solid 1px #aaa;
      }
    }
  }
}
</style>
