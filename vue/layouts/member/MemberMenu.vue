<template>
    <div class="md:w-2/12 mb-2">
        <div class="border bg-white hidden md:block">
            <img :src="user.avatar" class="w-full object-cover cursor-pointer" @click="$router.push({ name: 'member.info.avatar' })" />
            <div class="text-gray-800 mx-3 py-4  border-b border-gray-200">{{ user.name }}</div>
            <div class="my-4 mx-3 flex justify-between text-gray-500">
                <i class="fa fa-envelope" :class="{ 'text-info': user.email }"></i>
                <i class="fas fa-phone" :class="{ 'text-info': user.mobile }"></i>
                <i class="fab fa-weibo" :class="{ 'text-info': user.weibo }"></i>
                <i class="fab fa-weixin" :class="{ 'text-info': user.wechat }"></i>
                <i class="fab fa-github" :class="{ 'text-info': user.github }"></i>
                <i class="fab fa-qq" :class="{ 'text-info': user.qq }"></i>
            </div>
        </div>

        <div class="mt-3 border bg-white">
            <div v-for="(menu, index) in menus" :key="index" class="border-b border-gray-200">
                <router-link
                    :to="menu.to"
                    class="text-gray-500 block py-3 px-3 pl-3 hover:bg-gray-100"
                    :class="{ 'bg-gray-100 text-gray-800': menu.to.name == $route.name }"
                >
                    <i :class="menu.icon" class="w-4 inline-block"></i> {{ menu.title }}
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
const menus = [
    { title: '基本信息', to: { name: 'member.info.base' }, icon: 'fas fa-server' },
    { title: '修改头像', to: { name: 'member.info.avatar' }, icon: 'fas fa-camera-retro' },
    { title: '密码修改', to: { name: 'member.info.password' }, icon: 'fas fa-unlock-alt' },
    { title: '手机绑定', to: { name: 'member.info.mobile' }, icon: 'fas fa-phone-square-alt' },
    { title: '绑定邮箱', to: { name: 'member.info.email' }, icon: 'fas fa-envelope' }
]
export default {
    data() {
        return { menus }
    }
}
</script>

<style></style>
