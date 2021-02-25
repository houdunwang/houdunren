<template>
    <div>
        <top-menu />
        <div class="container-xl md:flex">
            <div class="md:w-10/12 md:mr-2">
                <keep-alive>
                    <router-view v-if="$route.meta.keepAlive"></router-view>
                </keep-alive>
                <router-view v-if="!$route.meta.keepAlive"></router-view>
            </div>
            <div class="md:w-2/12 mb-2">
                <div class="bg-white hidden md:block">
                    <a href="/member/info/avatar">
                        <img :src="member.avatar" class="w-full object-cover cursor-pointer" />
                    </a>
                    <div class="text-gray-800 px-3 py-4  border-b border-gray-200">{{ member.name }}</div>
                </div>
                <div class="mt-0 bg-white">
                    <div v-for="(menu, index) in menus" :key="index" class="border-b border-gray-200">
                        <router-link
                            :to="{ name: menu.route.name, params: { id: $route.params.id } }"
                            class="text-gray-500 block py-3 px-3 pl-3 hover:bg-gray-100"
                            :class="{ 'bg-gray-100 text-gray-800': menu.route.name == $route.name }"
                        >
                            <i :class="menu.icon" class="w-4 inline-block"></i> {{ menu.title }}
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const menus = [
    { title: 'TA的贴子', route: { name: 'space.topic' }, icon: 'far fa-file-word' },
    { title: 'TA的动态', route: { name: 'space.activity' }, icon: 'far fa-envelope' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            menus,
            member: {}
        }
    },
    async created() {
        this.member = await axios.get(`/api/user/${this.$route.params.id}`)
    }
}
</script>

<style></style>
