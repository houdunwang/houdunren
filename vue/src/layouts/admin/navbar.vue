<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import useMenuStore from '@/layouts/admin/useMenuStore'
import { MenuFoldOne, MenuUnfoldOne } from '@icon-park/vue-next'
const menuStore = useMenuStore()
</script>

<template>
  <div class="bg-white relative shadow-sm z-50 p-2 border-b-1 px-5 flex justify-between items-center">
    <div class="flex items-center">
      <div class="mr-2" @click.stop="menuStore.toggleMenu">
        <MenuUnfoldOne
          theme="filled"
          size="24"
          fill="#10ad57"
          class="cursor-pointer duration-300"
          v-if="menuStore.menuState" />
        <MenuFoldOne theme="filled" size="26" fill="#10ad57" class="cursor-pointer duration-300" v-else />
      </div>
      <HdBreadcrumb class="hidden md:block" />
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <HdFullScreen class="hidden 2xl:flex mr-3 text-gray-600" />
      <UserAvatarMenu />
    </div>
  </div>
</template>
