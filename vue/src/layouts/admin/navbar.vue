<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import useMenuStore from '@/layouts/admin/useMenuStore'
import { MenuFoldOne, MenuUnfoldOne, AllApplication } from '@icon-park/vue-next'
const menuStore = useMenuStore()
</script>

<template>
  <div class="bg-white relative shadow-sm z-50 p-2 border-b-1 px-5 flex justify-between items-center">
    <div class="flex items-center">
      <!-- <div class="mr-2" @click.stop="menuStore.toggleMenu">
        <MenuUnfoldOne
          theme="filled"
          size="24"
          fill="#10ad57"
          class="cursor-pointer duration-300"
          v-if="menuStore.menuState" />
        <MenuFoldOne theme="filled" size="24" fill="#10ad57" class="cursor-pointer duration-300" v-else />
      </div> -->
      <el-dropdown trigger="click" size="default">
        <all-application theme="outline" size="20" fill="#10ad57" />
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item> 系统配置 </el-dropdown-item>
            <el-dropdown-item :divided="true"> 视频教程 </el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>

      <HdBreadcrumb class="hidden md:block" />
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <UserAvatarMenu />
    </div>
  </div>
</template>
