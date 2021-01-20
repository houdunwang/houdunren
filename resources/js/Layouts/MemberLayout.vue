<template>
    <div class="text-sm text-gray-800">
        <div class="border-b-4 border-dark-green shadow-sm py-4">
            <div class="w-1280 m-auto flex justify-between">
                <nav>
                    <a href=""><i class="fas fa-home text-gray-600"></i> 首页 </a>
                </nav>
                <div class="flex items-center justify-center">
                    <img :src="$page.props.user.icon" class="w-6 h-6 object-cover rounded-sm mr-1" />
                    <a href="">退出</a>
                </div>
            </div>
        </div>

        <div class="w-1280 m-auto mt-3 flex">
            <div class="w-2/12">
                <div class="icon object-cover border border-gray-300 shadow-sm">
                    <img :src="$page.props.user.icon" class="object-cover w-full" />
                    <div class="text-gray-700 font-bold border-b border-gray-200 py-3 mx-3">
                        {{ $page.props.user.name }}
                    </div>
                    <div class="mt-3 text-gray-500 px-4 flex justify-between pb-3">
                        <i aria-hidden="true" class="fa fa-envelope text-info"></i>
                        <i aria-hidden="true" class="fas fa-phone-square "></i>
                        <i aria-hidden="true" class="fab fa-weibo text-info"></i>
                        <i aria-hidden="true" class="fab fa-weixin text-info"></i>
                        <i aria-hidden="true" class="fab fa-github text-info"></i>
                        <i aria-hidden="true" class="fab fa-qq text-info"></i>
                    </div>
                </div>
                <div class="mt-3 border border-gray-200 shadow-sm">
                    <div v-for="(menu, index) in menus" :key="index" class="border-b border-gray-200 py-3 cursor-pointer pl-3 hover:bg-gray-100">
                        {{ menu.title }}
                    </div>
                </div>
            </div>
            <div class="ml-2 w-10/12">
                <hd-message />
                <slot />
            </div>
        </div>
    </div>
</template>
<script>
const menus = [
    { title: '资料修改', route: '' },
    { title: '基本信息', route: '' },
    { title: '密码修改', route: '' },
    { title: '邮箱修改', route: '' },
    { title: '手机验证', route: '' },
    { title: '修改头像', route: '' }
]
export default {
    data() {
        return {
            menus
        }
    },
    mounted() {}
}
</script>

<style></style>
