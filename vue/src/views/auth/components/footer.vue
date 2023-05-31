<script setup lang="ts"></script>

<template>
  <div class="flex gap-2 justify-center mt-5">
    <router-link v-if="$route.name != RouteName.LOGIN" :to="{ name: RouteName.LOGIN }" class="text-xs text-gray-700">
      用户登录
    </router-link>
    <router-link
      v-if="$route.name != RouteName.REGISTER"
      :to="{ name: RouteName.REGISTER }"
      class="text-xs text-gray-700">
      会员注册
    </router-link>
    <router-link
      v-if="$route.name != RouteName.FORGOT_PASSWORD"
      :to="{ name: RouteName.FORGOT_PASSWORD }"
      class="text-xs text-gray-700">
      找回密码
    </router-link>
    <router-link to="/" class="text-xs text-gray-700">网站首页</router-link>
  </div>
</template>
