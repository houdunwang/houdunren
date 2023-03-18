<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import useMenuStore from '@/layouts/admin/useMenuStore'
import { AllApplication, Home } from '@icon-park/vue-next'
import menuData from './menuData'

const menuStore = useMenuStore()

const { open } = useUtil()
</script>

<template>
  <main class="bg-white px-3 border-b-4 border-[#16a085]">
    <section class="2xl:w-page 2xl:m-auto relative shadow-sm z-50 py-3 border-b-1 flex justify-between items-center">
      <div class="flex items-center">
        <home theme="outline" size="26" fill="#10ad57" @click="open('/')" class="cursor-pointer hidden md:block" />

        <el-dropdown trigger="click" size="default" class="md:hidden">
          <AllApplication theme="outline" size="26" fill="#10ad57" />
          <template #dropdown>
            <el-dropdown-menu>
              <el-dropdown-item
                v-for="(menu, index) in menuData"
                :key="index"
                @click="$router.push({ name: menu.routeName })">
                {{ menu.title }}
              </el-dropdown-item>
            </el-dropdown-menu>
          </template>
        </el-dropdown>
      </div>
      <div class="flex justify-center items-center relative cursor-pointer">
        <UserAvatarMenu />
      </div>
    </section>
  </main>
</template>
