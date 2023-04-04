<script setup lang="ts">
const { open } = useUtil()
</script>

<template>
  <div class="h-screen !w-screen bg-gray-700 flex flex-col justify-center items-center !-mt-0 font-mono">
    <img src="/images/xj.jpg" class="w-28 h-28 shadow-2xl object-cover rounded-full" />
    <HdFormButton class="primary ml-2 my-5" @click="$router.push({ name: RouteName.ADMIN })"> 系统设置 </HdFormButton>
    <!-- <HdFormButton class="primary ml-2" @click="open('/auth/login')"> 用户登录 </HdFormButton> -->
    <!-- <HdFormButton class="success ml-2" @click="$router.push({ name: RouteName.MEMBER })"> 会员中心 </HdFormButton> -->
    <!-- <h2 class="opacity-80 text-3xl font-extralight text-[#ffeaa7]">域名没有匹配到任何模块</h2> -->
    <div class="text-gray-300 text-base font-light font-mono drop-shadow-md opacity-60">
      善于调整自己心态，是人生的最大财富
    </div>
  </div>
</template>
