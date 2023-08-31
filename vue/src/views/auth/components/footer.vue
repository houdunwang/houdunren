<script setup lang="ts"></script>

<template>
  <main>
    <div class="flex gap-2 justify-center mt-8">
      <router-link
        :to="{ name: RouteName.LOGIN }"
        class="text-xs text-gray-700"
        :class="{ active: $route.name == RouteName.LOGIN }">
        用户登录
      </router-link>
      <router-link
        :to="{ name: RouteName.REGISTER }"
        class="text-xs text-gray-700"
        :class="{ active: $route.name == RouteName.REGISTER }">
        会员注册
      </router-link>
      <router-link
        :to="{ name: RouteName.FORGOT_PASSWORD }"
        class="text-xs text-gray-700"
        :class="{ active: $route.name == RouteName.FORGOT_PASSWORD }">
        找回密码
      </router-link>
      <router-link to="/" class="text-xs text-gray-700">网站首页</router-link>
    </div>
    <!-- <div class="text-xs text-center opacity-90 mt-3 font-light bg-slate-200 p-2 text-slate-700 rounded-lg">
      移动端设备请在【后盾云】微信公众号使用网站
    </div> -->
  </main>
</template>

<style lang="scss">
.active {
  @apply text-blue-800 font-bold;
}
</style>
