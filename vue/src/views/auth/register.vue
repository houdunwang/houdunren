<script setup lang="ts">
import WechatLogin from '@/components/hd/wechatLogin.vue'
import Footer from './components/footer.vue'
const { form, register } = useAuth()
</script>

<template>
  <form @submit.prevent="register">
    <div class="lg:w-[720px] md:grid md:grid-cols-2 rounded-md shadow-md overflow-hidden bg-gray-50">
      <div class="p-5 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">注册</h2>
          <div class="mt-8">
            <HdFormInput v-model="form.account" placeholder="请输入用户名" v-clearError="'account'" />
            <HdError name="account" />
            <HdFormInput
              v-model="form.password"
              class="mt-3"
              type="password"
              placeholder="请输入登录密码"
              v-clearError="'password'" />
            <HdError name="password" />
            <HdFormInput
              v-model="form.password_confirmation"
              class="mt-3"
              type="password"
              placeholder="请再次输入密码"
              v-clearError="'password_confirmation'" />
            <HdCaptcha class="mt-2" v-model:captcha="form.captcha" v-model:captcha_key="form.captcha_key" />
          </div>
          <HdFormButton class="w-full mt-3 primary">登录</HdFormButton>
          <div class="flex justify-center mt-3">
            <WechatLogin />
          </div>
        </div>
        <!-- <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">会员注册</h2>
          <div class="text-sm py-6 leading-6 text-center text-slate-800 font-light! opacity-70">
            新用户只提供微信注册 <br />
            之后在会员中心绑定手机号或邮箱 <br />
            然后就可以用手机号或邮箱登录了
          </div>
          <div class="flex justify-center mt-3">
            <WechatLogin />
          </div>
        </div> -->
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/register.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped></style>
