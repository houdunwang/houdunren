<template>
    <div>
        <top-menu />
        <div class="">
            <div class="h-36 overflow-hidden shadow-sm">
                <img src="/images/space.jpeg" class="object-cover" />
            </div>
            <div class="container-xl h-full">
                <div class="position-relative h-full">
                    <div class="transform -translate-y-1/4 md:-translate-y-1/2 flex flex-col items-center justify-center md:flex-row md:justify-between">
                        <div class="flex flex-col md:flex-row items-center md:items-end justify-content">
                            <img :src="member.icon" class="w-28 rounded-md object-cover cursor-pointer shadow-lg" @click.prevent="space(user)" />
                            <div class="md:ml-5 flex flex-col md:flex-row">
                                <div class="mt-2 md:mr-5 text-center">{{ member.name }}</div>
                                <div class="flex ml-2" v-if="user.id != member.id" v-loading="loading">
                                    <a href="#" class="btn btn-orange" @click.prevent="unFollow" v-if="member.is_following">取消关注</a>
                                    <a href="#" class="btn mr-1" @click.prevent="follow" v-else>关注TA </a>
                                </div>
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
        </div>
    </div>
</template>
<script>
const menus = [
    { title: 'TA的贴子', route: { name: 'space.topic' }, icon: 'far fa-file-word' },
    { title: 'TA的动态', route: { name: 'space.activity' }, icon: 'far fa-envelope' },
    { title: 'TA的关注', route: { name: 'space.follower' }, icon: 'far fa-envelope' },
    { title: 'TA的粉丝', route: { name: 'space.fans' }, icon: 'far fa-envelope' }
]
export default {
    route: { meta: { auth: true } },
    data() {
        return {
            menus,
            member: {},
            loading: true
        }
    },
    async created() {
        this.load()
    },
    watch: {
        async $route(n) {
            this.load()
        }
    },
    methods: {
        async load() {
            this.loading = true
            this.member = await axios.get(`/api/user/${this.$route.params.id}`)
            this.loading = false
        },
        async follow() {
            await axios.post(`/api/site/${this.site.id}/follow/user/${this.member.id}`)
            this.member.is_following = true
        },
        async unFollow() {
            await axios.delete(`/api/site/${this.site.id}/follow/user/${this.member.id}`)
            this.member.is_following = false
        }
    }
}
</script>

<style></style>
