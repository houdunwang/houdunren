<script setup lang="ts">
import Footer from './components/footer.vue'
import Captcha from '@/components/hd/captcha.vue'
import WechatLogin from '@/components/hd/wechatLogin.vue'
const { login, form } = useAuth()
</script>

<template>
  <form @submit.prevent="login">
    <div class="lg:w-[720px] md:grid md:grid-cols-2 rounded-md shadow-md overflow-hidden bg-gray-50">
      <div class="p-5 flex flex-col justify-between box-border">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">登录</h2>

          <div class="mt-8">
            <HdFormInput v-model="form.account" placeholder="请输入用户名、邮箱或手机号" v-clearError="'account'" />
            <HdError name="account" />
            <HdFormInput
              v-model="form.password"
              class="mt-3"
              type="password"
              placeholder="请输入登录密码"
              v-clearError="'password'" />
            <HdError name="password" />
            <Captcha class="mt-2" v-model:captcha="form.captcha" v-model:captcha_key="form.captcha_key" />
          </div>
          <HdFormButton class="w-full mt-3 primary">登录</HdFormButton>
          <div class="flex justify-center mt-3">
            <WechatLogin />
          </div>
        </div>
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/login.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped></style>
