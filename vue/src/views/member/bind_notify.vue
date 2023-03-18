<script setup lang="ts"></script>

<template>
  <HdCard>
    <template #header>绑定通知</template>
    <div class="text-base font-bold text-gray-600">
      你需要绑定下
      <RouterLink :to="{ name: 'user.email' }">邮箱</RouterLink>
      或
      <RouterLink :to="{ name: 'user.mobile' }">手机</RouterLink>
      后使用网站。
    </div>
    <div class="flex items-center gap-2 bg-gray-100 p-3 mt-5">
      <icon-tips-one theme="outline" size="24" fill="#333" />
      这是因为如果某天取消微信登录了，你也可以正常访问网站。谢谢你的理解，添麻烦了
    </div>
  </HdCard>
</template>

<style lang="scss" scoped>
a {
  @apply text-teal-700;
}
</style>
