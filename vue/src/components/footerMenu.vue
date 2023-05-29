<script setup lang="ts">
import config from '@/config'
const { open } = useUtil()
const { user } = useUserStore()
</script>

<template>
  <main
    class="grid grid-flow-col content-center justify-items-center justify-around bg-gray-100 border-t border-t-gray-300 py-3 z-10 fixed bottom-0 left-0 right-0 shadow-inner md:hidden">
    <div v-for="(navbar, index) of config.navbar" :key="index">
      <el-dropdown trigger="click" size="default" :hide-on-click="true">
        <component :is="navbar.icon" theme="outline" :fill="navbar.color" />
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item
              v-for="(menu, i) of navbar.menus"
              :key="i"
              @click="menu?.url ? open(menu.url, '_blank') : $router.push(menu.route)">
              {{ menu.title }}
            </el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>
    </div>
    <div v-if="user?.id">
      <el-dropdown trigger="click" size="default">
        <icon-me theme="outline" fill="#706fd3" />
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item @click="open(`/sign/space?uid=${user?.id}`)"> 个人空间 </el-dropdown-item>
            <el-dropdown-item @click="open(`/member`)"> 会员中心 </el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>
    </div>
  </main>
</template>

<style lang="scss" scoped>
.i-icon {
  @apply text-2xl;
}
</style>
