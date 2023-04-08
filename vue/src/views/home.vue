<script setup lang="ts">
const { open } = useUtil()
const { isLogin, logout } = useAuth()
</script>

<template>
  <div class="h-screen !w-screen bg-gray-700 flex flex-col justify-center items-center !-mt-0 font-mono">
    <img src="/images/xj.jpg" class="w-28 h-28 shadow-2xl object-cover rounded-full" />
    <div class="flex items-center gap-2">
      <HdFormButton class="primary ml-2 my-5" @click="$router.push({ name: RouteName.ADMIN })"> 系统管理 </HdFormButton>
      <HdFormButton class="danger ml-2" @click="logout" v-if="isLogin()"> 退出登录 </HdFormButton>
      <HdFormButton class="success ml-2" @click="open('/auth/login')" v-else> 用户登录 </HdFormButton>
      <!-- <HdFormButton class="success ml-2" @click="$router.push({ name: RouteName.MEMBER })"> 会员中心 </HdFormButton> -->
    </div>
    <h2 class="opacity-80 text-lg font-extralight text-[#ffeaa7] mb-2">域名没有匹配到模块，请在系统管理中进行配置</h2>
    <div class="text-gray-300 text-xs font-light font-mono drop-shadow-md opacity-50">
      善于调整自己心态，是人生的最大财富
    </div>
  </div>
</template>
