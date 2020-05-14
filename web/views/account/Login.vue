<template>
  <a-card title="会员登录" class="account shadow-sm animated fadeInDown">
    <a-form-model layout="vertical" :model="form" :rules="rules" ref="form">
      <a-form-model-item label="帐号" prop="account">
        <a-input v-model="form.account" placeholder="请输入邮箱或手机号" />
      </a-form-model-item>
      <a-form-model-item label="密码" prop="password">
        <a-input type="password" v-model="form.password" placeholder="请输入登录密码" />
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
            <a-button type="primary" @click="onSubmit">提交登录</a-button>
          </div>
          <div>
            <router-link :to="{ name: 'register' }" class="text-secondary mr-1">注册</router-link>
            <router-link :to="{ name: 'find-password' }" href class="text-secondary">忘记密码</router-link>
            <a href="/" class="text-secondary">首页</a>
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
import vue from 'vue'
export default {
  data() {
    return {
      rules: {
        account: [{ required: true, message: '帐号不能为空', trigger: 'blur' }],
        password: [{ required: true, message: '密码不能为空', trigger: 'blur' }],
        captcha: [{ required: true, message: '验证码不能为空' }]
      },
      form: {
        account: '',
        password: '',
        captcha: ''
      }
    }
  },
  computed: {
    ...mapGetters('user', ['isLogin'])
  },
  methods: {
    onSubmit() {
      this.$refs.form.validate(valid => {
        if (valid) {
          store.dispatch('user/login', this.form).then(response => {
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
