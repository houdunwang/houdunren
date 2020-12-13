<template>
  <form class="flex-grow" @submit.prevent="handleSubmit">
    <hd-card class="min-w-full shadow-xl">
      <template v-slot:header> 用户登录 </template>
      <template v-slot:default>
        <div class="flex flex-col mb-5">
          <hd-label class="w-16 mb-2 mr-2" value="用户名" />
          <hd-input v-model="form.account" id="account"></hd-input>
          <hd-error name="account" class="mt-2" />
        </div>

        <div class="flex flex-col mb-5">
          <hd-label class="w-16 mb-2 mr-2" value="密码" />
          <hd-input
            v-model="form.password"
            type="password"
            id="password"
          ></hd-input>
          <hd-error name="password" class="mt-2" />
        </div>

        <div class="flex flex-col mb-5">
          <hd-label class="w-16 mb-2 mr-2" value="验证码" />
          <div class="flex">
            <hd-input
              v-model="form.captcha"
              id="captcha"
              class="rounded-r-none"
            />
            <img
              :src="captcha"
              class="border cursor-pointer"
              @click="$event.target.src = captcha + Math.random()"
            />
          </div>
          <hd-error name="captcha" class="mt-2" />
        </div>

        <hd-label> <hd-checkbox v-model="form.remember" /> 记住我 </hd-label>
      </template>
      <template v-slot:footer>
        <div class="flex items-baseline justify-between">
          <hd-button>登录</hd-button>
          <div class="text-xs text-gray-600">
            <i class="text-green-500 fa fa-weixin" aria-hidden="true"></i>
            微信登录 &middot; <a href="">注册</a> &middot;
            <a href="">找回密码</a> &middot;
            <a href="">网站首页</a>
          </div>
        </div>
      </template>
    </hd-card>
  </form>
</template>

<script>
import Layout from "@/Layouts/AuthLayout";
export default {
  layout: Layout,
  data() {
    return {
      form: this.$inertia.form({
        account: "",
        password: "",
        captcha: "",
        remember: false,
      }),
    };
  },
  computed: {
    captcha() {
      return `/captcha?` + Math.random();
    },
  },
  methods: {
    handleSubmit() {
      this.form.post(route("auth.login.store"), {
        preserveScroll: true,
      });
      console.log(this.$page);

      if (this.$page.flash.redirect) location.href = this.$page.flash.redirect;
    },
  },
};
</script>

<style>
</style>
