<script setup lang="ts">
// 用户头像菜单
import dayjs from 'dayjs'
import config from '@/config'
const { open } = useUtil()
const { logout } = useAuth()
const storeUser = useUserStore()
</script>

<template>
  <main class="flex items-center">
    <section v-if="!!storeUser.user" class="flex items-center">
      <icon-people
        theme="outline"
        size="25"
        class="cursor-pointer text-gray-700 hover:text-gray-500 mr-2"
        @click="open('/detail')" />
      <el-dropdown trigger="click">
        <span class="el-dropdown-link flex items-center">
          <ElImage :src="storeUser.user.avatar" fit="cover" class="w-8 h-8 rounded-md" />
          <div class="flex flex-col text-xs ml-2 text-gray-600 font-light">
            {{ storeUser.user?.name }}
            <span>注册于 {{ dayjs(storeUser.user?.created_at).fromNow() }} </span>
          </div>
        </span>
        <template #dropdown>
          <el-dropdown-menu>
            <el-dropdown-item>
              <a href="/"> 网站首页 </a>
            </el-dropdown-item>
            <el-dropdown-item divided @click="logout">退出登录</el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>
    </section>
    <section v-else class="flex items-stretch gap-2">
      <a
        href="/login"
        class="px-3 py-2 flex items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        登录
      </a>
      <a
        href="/register"
        class="px-3 py-2 flex items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        注册
      </a>
    </section>
  </main>
</template>
