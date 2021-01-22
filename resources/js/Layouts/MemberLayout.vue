<template>
    <div class="text-sm text-gray-800">
        <div class="border-b-4 border-dark-green shadow-sm py-4">
            <div class="w-1280 m-auto flex justify-between">
                <nav>
                    <a href=""><i class="fas fa-home text-gray-600"></i> 首页 </a>
                </nav>
                <div class="flex items-center justify-center">
                    <img :src="$page.props.user.icon" class="w-6 h-6 object-cover rounded-sm mr-1" />
                    <a href="/logout">退出</a>
                </div>
            </div>
        </div>

        <div class="w-1280 m-auto mt-3 flex">
            <div class="w-2/12">
                <hd-user-info :user="$page.props.user" />
                <div class="mt-3 border border-gray-200 shadow-sm">
                    <div v-for="(menu, index) in menus" :key="index" class="">
                        <inertia-link :href="menu.route" class="block pl-3 py-3 border-b border-gray-200 cursor-pointer hover:bg-gray-100">
                            {{ menu.title }}
                        </inertia-link>
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
    { title: '基本信息', route: route('member.info.base') },
    { title: '密码修改', route: route('member.info.password') },
    { title: '修改头像', route: route('member.info.avatar') },
    { title: '邮箱修改', route: route('member.info.email') },
    { title: '手机绑定', route: route('member.info.mobile') }
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
