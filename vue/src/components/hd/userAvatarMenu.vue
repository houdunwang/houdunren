<script setup lang="ts">
// 用户头像菜单
import dayjs from 'dayjs'
const { logout } = useAuth()
const storeUser = useUserStore()
</script>

<template>
  <main class="flex items-center">
    <HdFullScreen class="hidden 2xl:flex mr-3 text-gray-600" />
    <section v-if="!!storeUser.user" class="flex items-center">
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
              <router-link :to="{ name: 'admin' }"> 后台管理 </router-link>
            </el-dropdown-item>
            <el-dropdown-item>
              <router-link :to="{ name: 'home' }" #default="{ href }" custom>
                <a :href="href"> 网站首页</a>
              </router-link>
            </el-dropdown-item>
            <el-dropdown-item divided @click="logout">退出登录</el-dropdown-item>
          </el-dropdown-menu>
        </template>
      </el-dropdown>
    </section>
    <section v-else class="flex items-stretch gap-2">
      <router-link
        to="/login"
        class="px-3 py-2 flex items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        登录
      </router-link>
      <router-link
        to="/register"
        class="px-3 py-2 flex items-center border shadow-sm rounded-md bg-slate-100 hover:bg-indigo-500 hover:!text-white duration-300">
        注册
      </router-link>
    </section>
  </main>
</template>
