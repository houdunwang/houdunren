<template>
  <div
    style="background-image: url(/images/admin.jpg)"
    class="min-h-screen bg-cover"
  >
    <!-- 顶部导航 -->
    <div
      class="flex items-center justify-between px-8 py-3 text-sm text-gray-300 bg-gray-900"
      style="opacity: 0.85"
    >
      <nav>
        <inertia-link class="mr-4" href="">
          <i class="fa fa-sitemap" aria-hidden="true"></i> 站点管理
        </inertia-link>
        <inertia-link class="mr-4" href="">
          <i class="fa fa-cubes" aria-hidden="true"></i> 模块管理
        </inertia-link>
        <inertia-link class="mr-4" href="">
          <i class="fa fa-comments-o" aria-hidden="true"></i> 系统设置
        </inertia-link>
        <inertia-link class="mr-4" href="">
          <i class="fa fa-users" aria-hidden="true"></i>
          会员组
        </inertia-link>
      </nav>
      <div class="relative">
        <div class="flex items-center cursor-pointer">
          <div class="w-8 h-8 mr-2" @click="showUserMenu = !showUserMenu">
            <img
              :src="$page.user.icon"
              class="w-8 h-8 mr-2 border rounded-full"
            />
          </div>
          <span class="text-sm text-gray-200">{{ $page.user.name }}</span>
        </div>
        <div
          class="absolute right-0 flex flex-col w-40 px-4 py-3 text-gray-800 bg-gray-100 border rounded-sm shadow-sm"
          v-show="showUserMenu"
        >
          <inertia-link class="mb-3 mr-4" href="">会员中心</inertia-link>
          <inertia-link class="mb-3 mr-4" href="">修改密码</inertia-link>
          <inertia-link class="mr-4" href="">退出登录</inertia-link>
        </div>
      </div>
    </div>
    <!-- 顶部导航 End-->

    <!-- 快速导航菜单 -->
    <div class="flex items-center justify-between px-4 mt-15">
      <div class="logo w-96">
        <a href="#">
          <img src="/images/logo.png" />
        </a>
      </div>
      <div class="flex justify-between">
        <a
          :href="menu.link"
          class="flex flex-col items-center justify-center w-32 h-20 px-4 py-3 mr-4 bg-white border rounded-lg shadow-md opacity-75 duration-500 hover:opacity-100"
          v-for="(menu, index) in quickMenus"
          :key="index"
        >
          <i class="fa-2x" :class="menu.icon" aria-hidden="true"></i>
          <span class="text-sm">{{ menu.title }}</span>
        </a>
      </div>
    </div>
    <!-- 快速导航菜单 End-->
    <div class="px-6 mt-10">
      <slot></slot>
    </div>

    <div class="flex justify-center py-8 mt-5 text-sm text-gray-900">
      <strong> 版权所有@houdunren.com </strong>
    </div>
  </div>
</template>

<script>
export default {
  props: [],
  data() {
    return {
      showUserMenu: false,
      quickMenus: [
        { title: "网站管理", link: "", icon: "fa fa-sitemap" },
        { title: "系统设置", link: "", icon: "fa fa-support" },
        { title: "退出", link: "", icon: "fa fa-sign-out" },
      ],
    };
  },
};
</script>

<style>
</style>
