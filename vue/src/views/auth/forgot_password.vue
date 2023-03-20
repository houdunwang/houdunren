<script setup lang="ts">
import CodeSend from '@/components/hd/codeSend.vue'
import { Wechat } from '@icon-park/vue-next'
import Footer from './components/footer.vue'
const { form, findPassword } = useAuth()
</script>

<template>
  <form @submit.prevent="findPassword">
    <div class="lg:w-[720px] bg-gray-50 md:grid grid-cols-2 rounded-md shadow-md overflow-hidden">
      <div class="p-6 flex flex-col justify-between">
        <div>
          <h2 class="text-center text-gray-700 text-lg mt-3">找回密码</h2>
          <div class="mt-8">
            <HdFormInput v-model="form.account" placeholder="请输入邮箱或手机号" v-clearError="'account'" />
            <HdError name="account" />
            <CodeSend v-model:account="form.account" v-model:code="form.code" type="exists" class="mt-3" />

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
