<template>
    <div class="flex flex-col h-screen font-sans">
        <!-- 顶部导航 -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between px-8 py-3 text-sm text-gray-300 bg-gray-900 relative z-10">
            <nav class="grid gap-5 gird-flow-row md:grid-flow-col">
                <a href="/site/site"> <i class="fas fa-backward"></i> 返回站点列表 </a>
                <a
                    :href="`/${module.name}/admin`"
                    v-for="module in modules"
                    :key="module.id"
                    class="font-bold"
                    :class="{ 'text-pink-300': module.id == $page.props.admin.module.id }"
                >
                    <i class="fa fa-cubes" aria-hidden="true"></i> {{ module.title }}
                </a>
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

        <div class="md:flex-1 flex flex-col md:flex-row">
            <!-- 左侧菜单 -->
            <nav
                class="h-full md:left-0 md:block md:overflow-y-auto md:flex-row md:flex-no-wrap md:overflow-hidden shadow-xl flex flex-wrap items-center justify-between relative md:w-48 z-10"
            >
                <div class="md:flex-col md:items-stretch md:min-h-full md:flex-no-wrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                    <div
                        class="flex flex-col items-start md:items-center opacity-100 md:relative md:mt-4 top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto flex-1 rounded"
                    >
                        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                            <li class="items-center border-b border-gray-100 mb-5 pb-3" v-for="menu in $page.props.admin.module.menus" :key="menu.id">
                                <a class="text-red-700 hover:text-pink-600 uppercase font-bold flex justify-between items-center text-sm mb-3 pl-6" href="">
                                    <div>
                                        <i class="opacity-75 mr-2 text-sm" :class="menu.icon"></i>
                                        {{ menu.title }}
                                    </div>
                                </a>
                                <div class="bg-white border-gray-200 rounded-md">
                                    <a
                                        class="text-gray-600 hover:bg-gray-200 text-sm uppercase flex font-bold bg-gray-00 py-2 pl-6"
                                        href=""
                                        v-for="(item, index) in menu.items"
                                        :key="index"
                                    >
                                        {{ item.title }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <h6 class="md:min-w-full text-gray-600 text-xs px-6 uppercase font-bold block pt-1 pb-4 no-underline mt-5">
                            系统功能
                        </h6>
                        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4 px-6">
                            <li class="inline-flex">
                                <a class="text-gray-500 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold" href="/">
                                    <i class="fas fa-home"></i>
                                    网站首页
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a class="text-gray-500 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold" href="/site/site">
                                    <i class="fas fa-sitemap"></i>
                                    站点列表
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a class="text-gray-500 hover:text-gray-600  text-sm block mb-4 no-underline font-semibold" href="`/site/${site.id}/config`">
                                    <i class="far fa-check-square"></i>
                                    站点配置
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a
                                    class="text-gray-500 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold"
                                    :href="`/wechat/site/${$page.props.admin.site.id}/wechat`"
                                >
                                    <i class="fab fa-weixin"></i>
                                    微信公众号
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- 左侧菜单 END-->
            <div class="p-10  pb-20 flex-1 overflow-y-auto shadow-lg md:ml-3 bordef-l border-gray-300  bg-gray-50">
                <hd-message />
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            modules: this.$page.props.admin.modules,
            showUserMenu: false,
            user: this.$page.props.user,
            site: this.$page.props.admin.site
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

<style lang="scss">
.admin {
    display: grid;
}
</style>
