<template>
  <a-card title="会员注册" class="account shadow-sm animated fadeInDown">
    <a-form-model layout="vertical" :model="form" :rules="rules" ref="form">
      <a-form-model-item label="帐号" prop="account">
        <a-input placeholder="请输入邮箱或手机号" v-model="form.account">
          <span
            slot="addonAfter"
            @click="send"
            defaultValue="发送验证码"
            style="width: 80px;cursor:pointer"
          >发送验证码</span>
        </a-input>
      </a-form-model-item>
      <a-form-model-item label="昵称" prop="nickname">
        <a-input v-model="form.nickname" placeholder="起一个特别的昵称吧" />
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
            <router-link :to="{name:'login'}" class="text-secondary mr-1">登录</router-link>
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
const rules = {
  username: [{ required: true, message: '帐号不能为空', trigger: 'blur' }],
  nickname: [{ required: true, message: '昵称不能为空', trigger: 'blur' }],
  password: [{ required: true, message: '密码不能为空', trigger: 'blur' }],
  password_confirmation: [{ required: true, message: '确认密码不能为空', trigger: 'blur' }],
  captcha: [{ required: true, message: '验证码不能为空' }]
}
const form = {
  account: '',
  nickname: '',
  password: '',
  captcha: '',
  password: '',
  password_confirmation: ''
}
export default {
  data() {
    return {
      rules,
      form
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
    },
    async send() {
      if (this.form.account == '') {
        this.$message.error('帐号不能为空')
      } else {
        await this.axios.post(`common/code/send`)
        this.$message.success('验证码发送成功')
      }
    }
  }
}
</script>
<style lang="scss" >
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
