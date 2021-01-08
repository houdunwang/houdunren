<template>
    <div class="flex flex-col h-screen font-sans">
        <div class="flex items-center justify-between px-8 py-3 text-sm text-gray-300 bg-gray-700 relative z-10 col-span-2">
            <nav>
                <inertia-link class="mr-4" href="">
                    <!-- <i class="fa fa-sitemap" aria-hidden="true"></i> -->
                    <!-- <img :src="$page.module.preview" style="width:50px;height:50px;" class="rounded-lg" /> -->
                    {{ $page.admin.module.title }}
                </inertia-link>
                <inertia-link class="mr-4" href=""> <i class="fa fa-sitemap" aria-hidden="true"></i> 站点管理 </inertia-link>
                <inertia-link class="mr-4" href="" v-if="$page.user.isSuperAdmin"> <i class="fa fa-cubes" aria-hidden="true"></i> 模块管理 </inertia-link>
                <inertia-link class="mr-4" :href="route('system.home')" v-if="$page.user.isSuperAdmin">
                    系统设置
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
                    <inertia-link class="mr-4" :href="route('auth.logout')">退出登录</inertia-link>
                </div>
            </div>
        </div>

        <div class="flex-1 flex">
            <!-- 顶部导航 -->
            <nav
                class="md:left-0 md:block md:overflow-y-auto md:flex-row md:flex-no-wrap md:overflow-hidden shadow-xl flex flex-wrap items-center justify-between relative md:w-52 z-10 py-4 px-6 bg-white"
            >
                <div class="md:flex-col md:items-stretch md:min-h-full md:flex-no-wrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                    <!-- <button
                        class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                        type="button"
                    >
                        <i class="fas fa-bars"></i>
                    </button>
                    <a
                        class="md:block text-left md:pb-2 text-gray-700 mr-0 inline-block whitespace-no-wrap text-sm uppercase font-bold p-4 px-0"
                        href="/learning-lab/tailwind-starter-kit/presentation"
                        >{{ $page.module.title }}</a
                    > -->

                    <div
                        class="flex flex-col opacity-100 md:relative md:mt-4 absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                    >
                        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                            <li class="items-center mb-1" v-for="menu in $page.admin.module.menus" :key="menu.id">
                                <a class="text-pink-700 hover:text-pink-600 uppercase font-bold flex justify-between items-center text-sm" href="">
                                    <div>
                                        <i class="opacity-75 mr-2 text-sm" :class="menu.icon"></i>
                                        {{ menu.title }}
                                    </div>
                                    <!-- <i class="fas fa-angle-right text-md text-gray-500"></i> -->
                                </a>
                                <div class="bg-white border-gray-200 px-5 py-3 rounded-md">
                                    <a
                                        class="text-gray-500 hover:text-pink-600 text-sm mb-2 ml-2 uppercase flex font-bold"
                                        href=""
                                        v-for="(item, index) in menu.items"
                                        :key="index"
                                    >
                                        {{ item.title }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <hr class="my-4 md:min-w-full" />
                        <h6 class="md:min-w-full text-gray-600 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                            系统功能
                        </h6>
                        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                            <li class="inline-flex">
                                <a
                                    class="text-gray-800 hover:text-gray-600  text-sm block mb-4 no-underline font-semibold"
                                    href="/learning-lab/tailwind-starter-kit/documentation/angular/alerts"
                                >
                                    <i class="fab fa-angular mr-2 text-gray-500 text-base"></i>
                                    网站首页
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a
                                    class="text-gray-800 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold"
                                    href="/learning-lab/tailwind-starter-kit/documentation/css/alerts"
                                >
                                    <i class="fab fa-css3-alt mr-2 text-gray-500 text-base"></i>
                                    站点列表
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a
                                    class="text-gray-800 hover:text-gray-600 text-sm block mb-4 no-underline font-semibold"
                                    href="/learning-lab/tailwind-starter-kit/documentation/vue/alerts"
                                >
                                    <i class="fa fa-weixin mr-2 text-gray-500 text-base" aria-hidden="true"></i>
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    微信公众号
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a
                                    class="text-gray-800 hover:text-gray-600  text-sm block mb-4 no-underline font-semibold"
                                    href="/learning-lab/tailwind-starter-kit/documentation/react/alerts"
                                >
                                    <i class="fab fa-react mr-2 text-gray-500 text-base"></i>
                                    角色管理
                                </a>
                            </li>
                            <li class="inline-flex">
                                <a
                                    class="text-gray-800 hover:text-gray-600  text-sm block mb-4 no-underline font-semibold"
                                    href="/learning-lab/tailwind-starter-kit/documentation/javascript/alerts"
                                >
                                    <i class="fab fa-js-square mr-2 text-gray-500 text-base"></i>
                                    站点配置
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- 顶部导航 End-->
            <!-- 快速导航菜单 End-->
            <div class="px-5 py-4 flex-1 overflow-y-auto bg-gray-100" style="height:1000px">
                <hd-message class="mb-5" />
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showUserMenu: false
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
