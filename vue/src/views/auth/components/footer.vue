<script setup lang="ts"></script>

<template>
  <main>
    <div class="flex gap-2 justify-center mt-5 font-normal text-xs opacity-90 font-mono">
      <router-link v-if="$route.name != 'login'" to="/login" class="text-gray-600"> 用户登录 </router-link>
      <router-link v-if="$route.name != 'register'" to="/register" class="text-gray-700">会员注册</router-link>
      <router-link v-if="$route.name != 'password'" :to="{ name: 'password' }" class="text-gray-700">
        找回密码
      </router-link>
      <a href="/" class="text-gray-700">网站首页</a>
    </div>
  </main>
</template>

<style lang="scss"></style>
