<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { AllApplication, Home } from '@icon-park/vue-next'
import config from '@/config'
</script>

<template>
  <main class="bg-white border-b-4 border-[#e66767]">
    <section class="2xl:w-page 2xl:m-auto py-3 px-3 border-b-1 flex justify-between items-center">
      <div class="flex items-center">
        <home
          theme="outline"
          size="26"
          fill="#e66767"
          @click="$router.push({ name: 'home' })"
          class="cursor-pointer hidden md:block" />
        <el-dropdown trigger="click" size="default" class="md:hidden">
          <AllApplication theme="outline" size="26" fill="#e66767" class="md:hidden" />
          <template #dropdown>
            <el-dropdown-menu>
              <el-dropdown-item
                v-for="(menu, index) in config.member.menu"
                :key="index"
                @click="$router.push({ name: menu.routeName })">
                {{ menu.title }}
              </el-dropdown-item>
            </el-dropdown-menu>
          </template>
        </el-dropdown>
      </div>
      <UserAvatarMenu />
    </section>
  </main>
</template>
