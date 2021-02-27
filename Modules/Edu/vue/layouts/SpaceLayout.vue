<template>
    <div>
        <top-menu />
        <div class="">
            <!-- <div class="h-36 position-relative mb-20 border-t-1 border-b-4 border-gray-500 shadow" style="background-image: url(/images/space.jpeg)"></div> -->
            <div class="h-36 overflow-hidden">
                <img src="/images/space.jpeg" class="object-cover" />
            </div>
            <div class="container-xl h-full">
                <div class="position-relative h-full">
                    <div class="transform -translate-y-1/4 md:-translate-y-1/2 flex flex-col items-center justify-center md:flex-row md:justify-between">
                        <div class="flex flex-col md:flex-row items-center md:items-end justify-content ">
                            <img :src="member.avatar" class="w-28 rounded-md object-cover cursor-pointer shadow-lg" />
                            <div class="md:ml-5">
                                <div class="mt-2">{{ member.name }}</div>
                            </div>
                        </div>
                        <div class="md:self-end grid grid-flow-row md:grid-flow-col grid-cols-4 md:grid-cols-4 gap-2 md:mt-0 mt-2">
                            <router-link
                                v-for="(menu, index) in menus"
                                :key="index"
                                :to="{ name: menu.route.name, params: { id: $route.params.id } }"
                                class="text-gray-50 block py-2 px-2 hover:bg-hd bg-gray-500 duration-300 text-xs md:text-base shadow rounded-sm"
                                :class="{ 'bg-hd': menu.route.name == $route.name }"
                            >
                                <!-- <i :class="menu.icon" class="w-4 inline-block"></i> -->
                                {{ menu.title }}
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-xl md:flex md:mt-0 -mt-5">
            <div class="md:w-full">
                <keep-alive>
                    <router-view v-if="$route.meta.keepAlive"></router-view>
                </keep-alive>
                <router-view v-if="!$route.meta.keepAlive"></router-view>
            </div>
            <!-- <div class="md:w-2/12 mb-2">
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
            </div> -->
        </div>
    </div>
</template>
<script>
const menus = [
    { title: 'TA的贴子', route: { name: 'space.topic' }, icon: 'far fa-file-word' },
    { title: 'TA的动态', route: { name: 'space.activity' }, icon: 'far fa-envelope' },
    { title: 'TA的关注', route: { name: 'space.activity' }, icon: 'far fa-envelope' },
    { title: 'TA的粉丝', route: { name: 'space.activity' }, icon: 'far fa-envelope' }
]
export default {
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
