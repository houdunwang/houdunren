<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { AllApplication } from '@icon-park/vue-next'
</script>

<template>
  <div
    class="bg-white relative shadow-sm z-50 py-3 border-b-1 px-5 flex justify-between items-center border-b-4 border-[#574b90]">
    <div class="flex items-center">
      <el-dropdown trigger="click" size="default">
        <all-application theme="outline" size="26" fill="#574b90" />
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item> 系统配置 </el-dropdown-item>
            <el-dropdown-item :divided="true"> 视频教程 </el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>

      <!-- <HdBreadcrumb class="hidden md:block" /> -->
    </div>
    <div class="flex justify-center items-center relative cursor-pointer">
      <UserAvatarMenu />
    </div>
  </div>
</template>
