<template>
    <div style="background-image: url(/images/admin.jpg)" class="min-h-screen bg-cover">
        <!-- 顶部导航 -->
        <div class="flex items-center justify-between px-8 py-3 text-sm text-gray-300 bg-gray-900 relative z-10">
            <nav>
                <inertia-link class="mr-4" href=""> <i class="fa fa-sitemap" aria-hidden="true"></i> 站点管理 </inertia-link>
                <inertia-link class="mr-4" href="" v-if="$page.user.isSuperAdmin"> <i class="fa fa-cubes" aria-hidden="true"></i> 模块管理 </inertia-link>
                <inertia-link class="mr-4" :href="route('system.home')" v-if="$page.user.isSuperAdmin">
                    <i class="fa fa-comments-o" aria-hidden="true"></i> 系统设置
                </inertia-link>
                <inertia-link class="mr-4" href="" v-if="$page.user.isSuperAdmin">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    会员组
                </inertia-link>
            </nav>

            <div class="relative" ref="topMenus">
                <div class="flex items-center cursor-pointer">
                    <div class="w-8 h-8 mr-2" @click="showUserMenu = !showUserMenu">
                        <img :src="$page.user.icon" class="w-8 h-8 mr-2 border rounded-full" />
                    </div>
                    <span class="text-sm text-gray-200">{{ $page.user.name }}</span>
                </div>
                <div
                    class="absolute right-0 flex flex-col w-40 px-4 py-3 text-gray-800 bg-gray-100 border rounded-sm shadow-sm"
                    :class="{ hidden: !showUserMenu }"
                >
                    <inertia-link class="mb-3 mr-4" href="">会员中心</inertia-link>
                    <inertia-link class="mb-3 mr-4" href="">修改密码</inertia-link>
                    <inertia-link class="mr-4" :href="route('logout')">退出登录</inertia-link>
                </div>
            </div>
        </div>
        <!-- 顶部导航 End-->

        <!-- 快速导航菜单 -->
        <div class="flex items-center justify-between px-4 mt-15">
            <div class="logo w-96">
                <a href="#">
                    <img :src="$page.system.config.logo" />
                </a>
            </div>
            <div class="flex justify-between">
                <div v-for="(menu, index) in quickMenus" :key="index">
                    <a
                        v-if="menu.show"
                        :href="menu.link"
                        class="bg-white border rounded-lg shadow-md w-32 h-20 px-4 py-3 flex flex-col justify-center items-center mr-4 opacity-75 duration-500 hover:opacity-100"
                    >
                        <i class="fa-2x" :class="menu.icon" aria-hidden="true"></i>
                        <span class="text-sm">{{ menu.title }}</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- 快速导航菜单 End-->
        <div class="mt-10 bg-white mx-3 px-5 py-4 shadow-md rounded-sm">
            <hd-message class="mb-5" />
            <slot></slot>
        </div>

        <div class="mt-5 flex justify-center py-8 text-sm text-gray-900 text-center font-bold" v-html="$page.system.config.copyright"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showUserMenu: false,
            quickMenus: [
                {
                    title: '网站管理',
                    link: route('site.site.index'),
                    icon: 'fa fa-sitemap',
                    show: true
                },
                {
                    title: '系统设置',
                    link: route('system.home'),
                    icon: 'fa fa-support',
                    show: this.$page.user.isSuperAdmin
                },
                { title: '退出', link: route('logout'), icon: 'fa fa-sign-out', show: true }
            ]
        }
    },
    mounted() {
        //点击文档区域时隐藏右侧顶部菜单
        window.document.addEventListener('click', e => {
            if (!e.path.some(node => node == this.$refs.topMenus)) {
                this.showUserMenu = false
            }
        })
    }
}
</script>

<style></style>
