<template>
  <master>
    <template v-slot:header>用户登录</template>

    <template v-slot:body>
      <ValidationObserver v-slot="{ handleSubmit }">
        <form @submit.prevent="handleSubmit(onSubmit)">
          <ValidationProvider name="username" rules="required" v-slot="{ errors }" e>
            <div class="form-group has-error">
              <label id="username">用户名</label>
              <input
                type="text"
                id="username"
                class="form-control"
                :class="{ 'is-invalid': errors[0] }"
                v-model="user.username"
                placeholder="用户名"
              />
              <span class="form-text text-danger small" v-if="errors[0]">请输入用户名</span>
            </div>
          </ValidationProvider>
          <ValidationProvider name="密码" rules="required|min:5" v-slot="{ errors }">
            <div class="form-group invalid">
              <label for="password">密码</label>
              <input
                id="password"
                type="text"
                class="form-control"
                v-model="user.password"
                placeholder="登录密码"
                :class="{ 'is-invalid': errors[0] }"
              />
              <span class="form-text text-danger small" v-if="errors[0]">密码不能少于五位</span>
            </div>
          </ValidationProvider>
          <button type="submit" class="btn btn-primary" :disabled="isSubmit">登录</button>
        </form>
      </ValidationObserver>
    </template>

    <template v-slot:footer="{ site }">
      <div class="d-flex justify-content-between">
        <div>
          <a href class="mr-2 text-secondary">
            <i class="fa fa-home"></i> 访问首页
          </a>
          <router-link :to="{ name: 'register' }" class="text-secondary">
            <i class="fa fa-user"></i>
            用户注册
          </router-link>
        </div>
        <div>{{ site }}</div>
      </div>
    </template>
  </master>
</template>

<script>
import Master from "./Master";
import { mapActions, mapMutations } from "vuex";
export default {
  data() {
    return {
      user: {
        username: "2300071698@qq.com",
        password: "admin888"
      },
      isSubmit: false
    };
  },
  components: {
    Master
  },
  methods: {
    ...mapActions("user", ["login"]),
    onSubmit(e) {
      this.isSubmit = true;
      let request = this.login({
        username: this.user.username,
        password: this.user.password
      })
        .then(user => {
          this.$router.push("/admin");
        })
        .catch(error => {
          if (status == 401) this.$message.error("帐号或密码错误");
        })
        .finally(_ => {
          this.isSubmit = false;
        });
    }
  }
};
</script>
