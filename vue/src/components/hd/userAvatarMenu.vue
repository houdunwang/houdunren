<script setup lang="ts">
import dayjs from 'dayjs'
import config from '@/config'
const { logout, isLogin } = useAuth()
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
            {{ storeUser.user?.nickname }}
            <span>注册于 {{ dayjs(storeUser.user?.created_at).fromNow() }} </span>
          </div>
        </span>
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item v-for="(menu, index) of config.user.avatarMenu" :key="index">
              <router-link :to="{ name: menu.routeName }" target="_blank"> {{ menu.title }} </router-link>
            </el-dropdown-item>
            <el-dropdown-item v-if="isLogin()">
              <router-link :to="{ name: 'sign.space', query: { uid: storeUser.user.id } }" target="_blank">
                个人空间
              </router-link>
            </el-dropdown-item>
            <!-- <el-dropdown-item>
              <a href="/member"> 修改资料 </a>
            </el-dropdown-item> -->
            <el-dropdown-item divided v-if="isAdministrator()">
              <router-link :to="{ name: RouteName.ADMIN }" target="_blank"> 后台管理 </router-link>
            </el-dropdown-item>
            <el-dropdown-item @click="logout">退出登录</el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>
    </section>
    <section v-else class="flex items-stretch gap-2">
      <router-link
        to="/login"
        class="px-3 py-1 flex text-sm items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        登录
      </router-link>
      <router-link
        to="/register"
        class="px-3 py-1 flex text-sm items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        注册
      </router-link>
    </section>
  </main>
</template>
