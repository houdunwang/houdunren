<template>
  <el-row class="login" justify="center" type="flex" align="middle" label-width="100px">
    <el-col :sm="24" :md="12" :lg="6">
      <el-card class="box-card">
        <div slot="header" class="clearfix">
          <span>登录后台</span>
        </div>
        <el-form :model="field" :rules="rules" ref="ruleForm">
          <el-form-item label="活动名称" prop="username">
            <el-input placeholder="请输入帐号" v-model="field.username"></el-input>
          </el-form-item>
          <el-form-item label="活动名称" prop="password">
            <el-input type="password" placeholder="登录密码" v-model="field.password"></el-input>
          </el-form-item>
          <el-form-item label="验证码">
            <el-input placeholder="请输入验证码">
              <template slot="append">验证码</template>
            </el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="submitForm('ruleForm')">登录帐号</el-button>
          </el-form-item>
        </el-form>
      </el-card>
    </el-col>
  </el-row>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      field: {
        username: "2300071698@qq.com",
        password: "admin888"
      },
      rules: {
        username: [
          {
            type: "email",
            required: true,
            message: "请输入邮箱",
            trigger: "blur"
          }
        ],
        password: [{ required: true, message: "密码不能为空", trigger: "blur" }]
      }
    };
  },
  methods: {
    ...mapActions("user", ["adminLogin"]),
    submitForm(formName) {
      this.$refs[formName].validate(async valid => {
        if (valid) {
          await this.adminLogin(this.field);
          this.$router.push({name:'site.manage.index'})
        } else {
          return false;
        }
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.login {
  padding: 10px;
  height: 100vh;
  background: #f3f3f3;
  & > div {
    @media screen and(min-width: 960px) {
      margin-top: -150px;
    }
  }
}
</style>
