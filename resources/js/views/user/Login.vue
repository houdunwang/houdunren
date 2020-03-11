<template>
  <div class="d-flex justify-content-center align-items-center login">
    <div class="card shadow">
      <div class="card-header bg-white">用户登录</div>
      <div class="card-body">
        <el-form :model="form" ref="form" label-width="70px">
          <el-form-item label="帐号" prop="username" :rules="[{ required: true, message: '请输入帐号' }]">
            <el-input v-model="form.username" placeholder="请输入登录帐号"></el-input>
          </el-form-item>
          <el-form-item label="密码" prop="password" :rules="[{ required: true, message: '密码不能为空' }]">
            <el-input v-model="form.password" placeholder="请输入登录密码"></el-input>
          </el-form-item>
          <el-form-item
            label="验证码"
            prop="captcha"
            class="captcha"
            :rules="[{ required: true, message: '验证码不能为空' }]"
          >
            <el-input v-model="form.captcha" placeholder="请输入登录密码" :style="{ padding: 0 }">
              <img
                :src="captcha"
                @click="captcha=captcha+`?${Math.random()}`"
                slot="append"
                :style="{ height: '30px', cursor: 'pointer' }"
              />
            </el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">登录</el-button>
            <el-button>注册</el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {},
      captcha: ''
    }
  },
  async created() {
    this.captcha = await this.axios.get(`common/captcha`).then(r => r.data)
  },
  methods: {
    onSubmit() {
      this.$refs['form'].validate(valid => {})
    }
  }
}
</script>

<style lang="scss" scoped>
.login {
  background-image: url('/images/admin-login.jpg');
  background-size: cover;
  height: 100vh;
}
@media screen and (max-width: 768px) {
  .card {
    width: 90%;
  }
}

@media screen and (min-width: 768px) {
  .card {
    width: 500px;
  }
}
</style>
