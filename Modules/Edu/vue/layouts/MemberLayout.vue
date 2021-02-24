<template>
    <div>
        <top-menu />
        <div class="container-xl md:flex">
            <div class="md:w-2/12 mb-2">
                <div class="bg-white hidden md:block">
                    <a href="/member/info/avatar">
                        <img :src="user.avatar" class="w-full object-cover cursor-pointer" />
                    </a>
                    <div class="text-gray-800 px-3 py-4  border-b border-gray-200">{{ user.name }}@@</div>
                </div>
                <div class="mt-0 bg-white">
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
            <div class="md:w-10/12 md:ml-2">
                <keep-alive>
                    <router-view v-if="$route.meta.keepAlive"></router-view>
                </keep-alive>
                <router-view v-if="!$route.meta.keepAlive"></router-view>
            </div>
        </div>
    </div>
</template>
<script>
const menus = [
    { title: '观看历史', to: { name: 'member.video' }, icon: 'fab fa-youtube' },
    { title: '我的贴子', to: { name: 'member.topic' }, icon: 'far fa-file-word' },
    { title: '我的订单', to: { name: 'member.order' }, icon: 'fas fa-shopping-cart' },
    { title: '站内消息', to: { name: 'member.sitemessage' }, icon: 'far fa-envelope' },
    { title: '会员周期', to: { name: 'member.duration' }, icon: 'far fa-address-card' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return { menus }
    },
    watch: {
        async $route(to) {
            this.messages = await axios.get(`front/message`)
        }
    },
    created() {
        this.$store.dispatch('siteMessage', 1)
    }
}
</script>

<style></style>
