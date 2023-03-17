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
          <h2 class="text-center text-gray-700 text-lg mt-3">会员注册</h2>
          <!-- <div class="mt-8">
            <HdFormInput v-model="form.account" placeholder="请输入邮箱" v-clearError="'account'" />
            <HdError name="account" />

            <HdFormInput v-model="form.password" class="mt-3" type="password" placeholder="密码" />
            <HdError name="password" />

            <HdFormInput v-model="form.password_confirmation" class="mt-3" type="password" placeholder="确认密码" />
            <HdFormButton class="w-full primary mt-2">注册</HdFormButton>
          </div> -->

          <div class="text-gray-700 text-sm opacity-80 mt-3 py-6 leading-6">
            新用户只提供微信注册，请点击下方微信图标 <br />
            之后在会员中心绑定手机号或邮箱 <br />
            然后就可以用手机号或邮箱登录了
          </div>
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
        <img src="/images/register.jpg" class="absolute h-full w-full object-cover" />
      </div>
    </div>
  </form>
</template>

<style lang="scss" scoped>
form {
  @apply flex justify-center items-start md:items-center p-5;
}
</style>
