<template>
  <a-card title="会员注册" class="account shadow-sm animated fadeInDown">
    <a-form-model layout="vertical" :model="form" :rules="rules" ref="form">
      <a-form-model-item label="帐号" prop="account">
        <a-input v-model="form.account" placeholder="请输入邮箱或手机号" @blur="checkAccount" />
      </a-form-model-item>
      <a-form-model-item label="验证码" prop="code">
        <send-code :code.sync="form.code" :account.sync="form.account" :state="!has" />
      </a-form-model-item>
      <a-divider>
        <i class="fa fa-user-circle text-secondary" aria-hidden="true"></i>
      </a-divider>
      <a-form-model-item label="昵称" prop="name">
        <a-input v-model="form.name" placeholder="起一个特别的昵称吧" />
      </a-form-model-item>
      <a-form-model-item label="密码" prop="password">
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
            <a-button type="primary" @click="onSubmit" style="margin-left: 10px;">提交注册</a-button>
          </div>
          <div>
            <router-link :to="{ name: 'login' }" class="text-secondary mr-1">登录</router-link>
            <router-link :to="{name:'find-password'}" href class="text-secondary">忘记密码</router-link>
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
  name: [{ required: true, message: '昵称不能为空', trigger: 'blur' }],
  password: [{ required: true, message: '密码不能为空', trigger: 'blur' }],
  password_confirmation: [{ required: true, message: '确认密码不能为空', trigger: 'blur' }],
  captcha: [{ required: true, message: '验证码不能为空' }]
}
const form = {
  account: '18600276067',
  code: '',
  name: '',
  password: '',
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
      if (this.has === true) {
        this.$message.warning('帐号错误或已经注册')
      }
    },
    onSubmit() {
      this.$refs.form.validate(valid => {
        if (valid) {
          store.dispatch('user/register', this.form).then(response => {
            location.href = this.$route.query.redirect || '/'
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
