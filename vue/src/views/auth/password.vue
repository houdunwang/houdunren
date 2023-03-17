<script setup lang="ts">
import { Wechat } from '@icon-park/vue-next'
import Footer from './components/footer.vue'
const { login, form } = useAuth()
</script>

<template>
  <form @submit.prevent="login">
    <div class="lg:w-[720px] bg-gray-50 md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">找回密码</h2>
          <div class="mt-8">
            <HdFormInput v-model="form.mobile" placeholder="请输入手机号" v-clearError="'account'" />
            <HdError name="account" />
            <HdFormInput v-model="form.password" class="mt-3" type="password" placeholder="请输入新密码" />
            <HdError name="password" />
            <HdFormInput v-model="form.password_confirmation" class="mt-3" type="password" placeholder="再次输入密码" />
          </div>

          <HdFormButton class="w-full primary mt-2">确定修改</HdFormButton>

          <div class="flex justify-center mt-3">
            <Wechat
              theme="outline"
              size="24"
              fill="#fff"
              class="fab fa-weixin bg-green-600 text-white rounded-full p-1 cursor-pointer" />
          </div>
        </div>
        <Footer />
      </div>
      <div class="hidden md:block relative">
        <img src="/images/forget-password.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped>
form {
  @apply flex justify-center items-start md:items-center p-5;
}
</style>
