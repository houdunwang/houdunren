<script setup lang="ts">
import dayjs from 'dayjs'
import config from '@/config'
const { logout } = useAuth()
const { isAdministrator } = useUser()
const storeUser = useUserStore()
</script>

<template>
  <main class="flex items-center">
    <section v-if="!!storeUser.user" class="flex items-center">
      <el-dropdown trigger="click">
        <span class="el-dropdown-link flex items-center">
          <UserAvatar :user="storeUser.user" fit="cover" class="w-7 h-7 rounded-sm" />
          <div class="flex flex-col text-xs ml-2 text-gray-600 font-light">
            {{ storeUser.user?.name }}
            <span>注册于 {{ dayjs(storeUser.user?.created_at).fromNow() }} </span>
          </div>
        </span>
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item v-if="isAdministrator()">
              <router-link :to="{ name: RouteName.ADMIN }"> 后台管理 </router-link>
            </el-dropdown-item>
            <el-dropdown-item v-for="(menu, index) of config.user.avatarMenu" :key="index">
              <router-link :to="{ name: menu.routeName }"> {{ menu.title }} </router-link>
            </el-dropdown-item>
            <el-dropdown-item @click="logout" divided>退出登录</el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>
    </section>
    <section v-else class="flex items-stretch gap-2">
      <a
        href="/login"
        class="px-3 py-1 flex text-sm items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        登录
      </a>
      <a
        href="/register"
        class="px-3 py-1 flex text-sm items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        注册
      </a>
    </section>
  </main>
</template>
