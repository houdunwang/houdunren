<template>
    <div style="background-image: url(/images/admin2.jpg)" class="min-h-screen bg-cover">
        <!-- 顶部导航 -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between px-8 py-3 text-sm text-gray-300 bg-gray-900 relative z-10">
            <nav class="grid md:grid-cols-4 gap-5">
                <inertia-link :href="route('admin')"> <i class="fa fa-sitemap" aria-hidden="true"></i> 站点管理 </inertia-link>
                <inertia-link :href="route('system.module.index')" v-if="user.isSuperAdmin">
                    <i class="fa fa-cubes" aria-hidden="true"></i> 模块管理
                </inertia-link>
                <inertia-link :href="route('system.home')" v-if="user.isSuperAdmin">
                    <i class="fas fa-comment"></i>
                    系统设置
                </inertia-link>
                <inertia-link :href="route('system.group.index')" v-if="user.isSuperAdmin">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    会员组
                </inertia-link>
            </nav>

            <div class="relative mt-3 md:mt-0" ref="topMenus" @click="showUserMenu = !showUserMenu">
                <div class="flex items-center cursor-pointer">
                    <div class="w-8 h-8 mr-2">
                        <img :src="user.icon" class="w-8 h-8 mr-2 border rounded-full" />
                    </div>
                    <span class="text-sm text-gray-200">{{ user.name }}</span>
                </div>
                <div
                    class="absolute left-0 md:left-auto md:right-1 flex flex-col w-40 px-4 py-3 text-gray-800 bg-gray-100 border rounded-sm shadow-sm"
                    :class="{ hidden: !showUserMenu }"
                >
                    <inertia-link class="mb-3 mr-4" href="">会员中心</inertia-link>
                    <inertia-link class="mb-3 mr-4" href="">修改密码</inertia-link>
                    <inertia-link class="mr-4" :href="route('auth.logout')">退出登录</inertia-link>
                </div>
            </div>
        </div>
        <!-- 顶部导航 End-->

        <!-- 快速导航菜单 -->
        <div class="flex flex-col md:flex-row items-center justify-between px-4 md:py-10 py-3">
            <div class="logo w-96 hidden md:block">
                <a href="#">
                    <img :src="$page.props.system.config.logo" />
                </a>
            </div>
            <div class="grid grid-cols-3 gap-2 w-full mt-3 md:mt-0 md:w-96">
                <div v-for="(menu, index) in quickMenus" :key="index">
                    <a
                        v-if="menu.show"
                        :href="menu.link"
                        class="bg-white border rounded-lg shadow-md box-border px-4 py-3 flex flex-col justify-center items-center opacity-75 duration-500 hover:opacity-100"
                    >
                        <i class="fa-2x" :class="menu.icon" aria-hidden="true"></i>
                        <span class="text-sm">{{ menu.title }}</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- 快速导航菜单 End-->
        <div class="bg-white mx-3 px-5 py-4 shadow-md rounded-sm">
            <hd-message />
            <slot></slot>
        </div>
        <div class="mt-5 flex justify-center py-8 text-sm text-gray-900 text-center font-bold" v-html="$page.props.system.config.copyright"></div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            showUserMenu: false,
            user: this.$page.props.user,
            quickMenus: [
                {
                    title: '网站管理',
                    link: route('site.site.index'),
                    icon: 'fas fa-sitemap',
                    show: true
                },
                {
                    title: '系统设置',
                    link: route('system.home'),
                    icon: 'far fa-life-ring',
                    show: this.$page.props.user.isSuperAdmin
                },
                { title: '退出', link: route('auth.logout'), icon: 'fas fa-sign-out-alt', show: true }
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
