<template>
  <a-card title="会员登录" class="account shadow-sm">
    <a-form-model layout="vertical" :model="form" :rules="rules" ref="form">
      <a-form-model-item label="用户名" prop="username">
        <a-input v-model="form.username" placeholder="请输入帐号|邮箱|手机号" />
      </a-form-model-item>
      <a-form-model-item label="密码" prop="password">
        <a-input type="password" v-model="form.password" placeholder="请输入登录密码" />
      </a-form-model-item>
      <a-form-model-item label="验证码" prop="captcha" class="captcha">
        <a-input placeholder="请输入图形验证码" v-model="form.captcha">
          <a-tooltip slot="suffix">
            <img src="/api/common/captcha-image" onclick="this.src=this.src+`?${Math.random()}`" />
          </a-tooltip>
        </a-input>
      </a-form-model-item>
      <a-form-model-item type="flex">
        <a-row type="flex" justify="space-between" align="middle">
          <div>
            <a-button type="primary" @click="onSubmit">登录</a-button>
            <a-button style="margin-left: 10px;">注册</a-button>
          </div>
          <div>
            <a href class="text-secondary">忘记密码</a>
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
        username: [{ required: true, message: '帐号不能为空', trigger: 'blur' }],
        password: [{ required: true, message: '密码不能为空', trigger: 'blur' }],
        captcha: [{ required: true, message: '验证码不能为空' }]
      },
      form: {
        username: '',
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
