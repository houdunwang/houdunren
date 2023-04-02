<script setup lang="ts">
const { open } = useUtil()
</script>

<template>
  <div class="h-screen !w-screen bg-gray-700 flex flex-col justify-center items-center !-mt-0">
    <img src="/images/xj.jpg" class="w-40 h-40 object-cover rounded-full border-8 border-white mb-5" />
    <div>
      <HdFormButton class="danger ml-2" @click="$router.push({ name: RouteName.ADMIN })"> 系统管理 </HdFormButton>
      <HdFormButton class="primary ml-2" @click="open('/auth/login')"> 用户登录 </HdFormButton>
      <HdFormButton class="success ml-2" @click="$router.push({ name: RouteName.MEMBER })"> 会员中心 </HdFormButton>
    </div>
    <div class="text-gray-300 text-xs font-mono drop-shadow-md mt-6">大叔晚八点直播，欢迎来共同学习技术</div>
  </div>
</template>
