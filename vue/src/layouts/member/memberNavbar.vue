<script setup lang="ts">
import UserAvatarMenu from '@/components/hd/userAvatarMenu.vue'
import { AllApplication, Home } from '@icon-park/vue-next'
import config from '@/config'
const { open } = useUtil()
</script>

<template>
  <main class="bg-white border-b-4 border-[#e66767]">
    <section class="2xl:w-page 2xl:m-auto py-3 px-3 border-b-1 flex justify-between items-center">
      <div
        @click="open('/')"
        class="font-bold items-center justify-between text-xl flex mr-2 text-[#e66767] cursor-pointer">
        <home theme="outline" size="26" fill="#e66767" />
      </div>
      <div class="flex items-center gap-2">
        <UserAvatarMenu />
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
    </section>
  </main>
</template>
