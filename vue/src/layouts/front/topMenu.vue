<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import MenuList from './menu-list.vue'
const { isLogin } = useAuth()
const { config } = useConfigStore()
const showMenu = ref(true)
document.addEventListener('click', () => (showMenu.value = true))
</script>

<template>
  <main
    class="flex items-center h-[65px] border-t-4 border-hd-origin border-b border-b-gray-200 bg-white sticky top-0 z-20 shadow-sm"
    v-if="config">
    <div class="flex justify-between items-center px-3 w-full 2xl:w-page 2xl:m-auto">
      <section class="flex flex-col items-center md:flex-row xl:items-center md:mr-6 text-gray-600">
        <!-- 网站 LOGO -->
        <div class="flex flex-row-reverse justify-between items-center">
          <router-link
            :to="{ name: 'home' }"
            class="font-bold items-center justify-between text-xl flex mr-2 text-[#F33A2F]">
            <icon-youtobe theme="outline" size="28" class="mr-1 hover:scale-110 duration-300" />
            <span class="font-bold font-sans">{{ config.base.name }} </span>
          </router-link>
        </div>
        <!-- 网站 LOGO END-->
        <!-- 菜单项 -->
        <MenuList class="justify-center gap-3 font-bold opacity-95 hidden md:flex" />
        <!-- 菜单项 END-->
      </section>
      <!-- 头像与站内消息 -->
      <section class="flex gap-2 items-center">
        <NotificationDown v-if="isLogin()" />
        <HdFullScreen class="hidden 2xl:flex text-gray-700 hover:text-gray-500" />
        <UserAvatarMenu />
      </section>
      <!-- 头像与站内消息 END-->
    </div>
  </main>
</template>
<style lang="scss" scoped></style>
